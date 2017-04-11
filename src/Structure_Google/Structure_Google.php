<?php
/**
 * Structure_Google class
 *
 * @package APIAPIStructureGoogle
 * @since 1.0.0
 */

namespace APIAPI\Structure_Google;

use APIAPI\Core\Structures\Structure;
use APIAPI\Core\Request\Request;
use APIAPI\Core\Request\Response;
use APIAPI\Core\Exception;

if ( ! class_exists( 'APIAPI\Structure_Google\Structure_Google' ) ) {

	/**
	 * Structure implementation for the API of any Google service.
	 *
	 * @since 1.0.0
	 */
	class Structure_Google extends Structure {
		/**
		 * Discovery URI for the API.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @var string
		 */
		protected $discovery_uri = '';

		/**
		 * Callback to get a cached structure response.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @var callable|null
		 */
		protected $get_cached_structure_callback = null;

		/**
		 * Callback to update the structure response in cache.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @var callable|null
		 */
		protected $update_cached_structure_callback = null;

		/**
		 * Internal variable to aid with parsing a discovery response.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @var array
		 */
		protected $uri_lookup = array();

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @param string $name          Slug of the instance.
		 * @param string $discovery_uri Dicovery URI for the API.
		 * @param array  $args          {
		 *     Optional. Array of arguments. Default empty array.
		 *
		 *     @type callable $get_cached_structure_callback    Callback to get a cached structure response.
		 *                                                      Must accept the discovery URI as sole parameter.
		 *                                                      Default null.
		 *     @type callable $update_cached_structure_callback Callback to update the structure response in
		 *                                                      cache. Must accept two parameters: The discovery
		 *                                                      URI as first and the structure array as second.
		 *                                                      Default null.
		 * }
		 */
		public function __construct( $name, $discovery_uri, $args = array() ) {
			$this->discovery_uri = $discovery_uri;

			foreach ( $args as $key => $value ) {
				if ( isset( $this->$key ) ) {
					$this->$key = $value;
				}
			}

			parent::__construct( $name );
		}

		/**
		 * Sets up the API structure.
		 *
		 * This method should populate the routes array, and can also be used to
		 * handle further initialization functionality, like setting the authenticator
		 * class and default authentication data.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function setup() {
			$structure_response = is_callable( $this->get_cached_structure_callback ) ? call_user_func( $this->get_cached_structure_callback, $this->discovery_uri ) : false;
			if ( ! is_array( $structure_response ) ) {
				$transporter = $this->get_default_transporter();

				$request = new Request( $this->discovery_uri, 'GET' );
				$response = new Response( $transporter->send_request( $request ) );

				if ( null === $response->get_param( 'baseUrl' ) ) {
					throw new Exception( sprintf( 'The structure request to %s returned an invalid response.', $this->discovery_uri ) );
				}

				$structure_response = array(
					'title'       => $response->get_param( 'title' ),
					'description' => $response->get_param( 'description' ),
					'baseUrl'     => $response->get_param( 'baseUrl' ),
					'parameters'  => $response->get_param( 'parameters' ),
					'auth'        => $response->get_param( 'auth' ),
					'resources'   => $response->get_param( 'resources' ),
				);

				if ( is_callable( $this->update_cached_structure_callback ) ) {
					call_user_func( $this->update_cached_structure_callback, $this->discovery_uri, $structure_response );
				}
			}

			if ( $structure_response['title'] ) {
				$this->title = $structure_response['title'];
			}

			if ( $structure_response['description'] ) {
				$this->description = $structure_response['description'];
			}

			$this->base_uri = $structure_response['baseUrl'];

			$this->global_params = $structure_response['parameters'];
			if ( isset( $this->global_params['key'] ) ) {
				$this->global_params['key']['internal'] = true;
			}
			if ( isset( $this->global_params['oauth_token'] ) ) {
				$this->global_params['oauth_token']['internal'] = true;
			}

			$this->uri_lookup = array();

			foreach ( $structure_response['resources'] as $endpoint_name => $endpoint ) {
				if ( isset( $endpoint['resources'] ) ) {
					foreach ( $endpoint['resources'] as $nested_endpoint_name => $nested_endpoint ) {
						$this->parse_endpoint( $nested_endpoint_name, $nested_endpoint );
					}
				} else {
					$this->parse_endpoint( $endpoint_name, $endpoint );
				}
			}
		}

		/**
		 * Parses endpoint data into routes.
		 *
		 * @since 1.0.0
		 * @access protected
		 *
		 * @param string $endpoint_name Name of the endpoint to parse.
		 * @param array  $endpoint      Data for that endpoint.
		 */
		protected function parse_endpoint( $endpoint_name, $endpoint ) {
			foreach ( $endpoint['methods'] as $method_name => $method_data ) {
				$uri = $method_data['path'];

				$method      = $method_data['httpMethod'];
				$description = $method_data['description'];
				$scopes      = $method_data['scopes'];

				$params = array();

				if ( ! isset( $method_data['parameters'] ) ) {
					$parsed_uri = $uri;

					$this->routes[ $parsed_uri ] = array(
						'primary_params' => array(),
						'methods'        => array(),
					);
				} elseif ( isset( $this->uri_lookup[ $uri ] ) ) {
					foreach ( $method_data['parameters'] as $param => $param_data ) {
						if ( isset( $param_data['location'] ) && 'path' === $param_data['location'] ) {
							continue;
						}

						$params[ $param ] = $param_data;
					}

					$parsed_uri = $this->uri_lookup[ $uri ];
				} else {
					$parsed_uri = $uri;
					$primary_params = array();
					foreach ( $method_data['parameters'] as $param => $param_data ) {
						if ( isset( $param_data['location'] ) && 'path' === $param_data['location'] ) {
							$primary_params[ $param ] = $param_data;

							$chars = 'integer' === $param_data['type'] ? '\d' : '\w-';
							$parsed_uri = str_replace( '{' . $param . '}', '(?P<' . $param . '>[' . $chars . ']+)', $parsed_uri );
						} else {
							$params[ $param ] = $param_data;
						}
					}

					$this->uri_lookup[ $uri ] = $parsed_uri;

					$this->routes[ $parsed_uri ] = array(
						'primary_params' => $primary_params,
						'methods'        => array(),
					);
				}

				$this->routes[ $parsed_uri ]['methods'][ $method ] = array(
					'description'            => $description,
					'params'                 => $params,
					'supports_custom_params' => false,
					'request_data_type'      => 'raw',
					'needs_authentication'   => ! empty( $scopes ),
				);
			}
		}

		/**
		 * Gets the default transporter object.
		 *
		 * @since 1.0.0
		 * @access protected
		 *
		 * @return APIAPI\Core\Transporters\Transporter Default transporter object.
		 */
		protected function get_default_transporter() {
			//TODO: This breaks the dependency injection pattern.
			return apiapi_manager()->transporters()->get_default();
		}
	}

}
