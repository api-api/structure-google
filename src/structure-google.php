<?php
/**
 * Structure loader.
 *
 * @package APIAPIStructureGoogle
 * @since 1.0.0
 */

if ( ! function_exists( 'apiapi_register_structure_google' ) ) {

	/**
	 * Registers the structure for the API of any Google service.
	 *
	 * It is stored in a global if the API-API has not yet been loaded.
	 *
	 * @since 1.0.0
	 */
	function apiapi_register_structure_google( $name, $discovery_uri ) {
		$structure = new APIAPI\Structure_Google\Structure_Google( $name, $discovery_uri );

		if ( function_exists( 'apiapi_manager' ) ) {
			apiapi_manager()->structures()->register( $name, $structure );
		} else {
			if ( ! isset( $GLOBALS['_apiapi_structures_loader'] ) ) {
				$GLOBALS['_apiapi_structures_loader'] = array();
			}

			$GLOBALS['_apiapi_structures_loader'][ $name ] = $structure;
		}
	}

}
