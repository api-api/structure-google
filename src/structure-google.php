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
	 *
	 * @param string $name          Unique slug for the service's API structure.
	 * @param string $discovery_uri Discovery URI for the API.
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

	apiapi_register_structure_google( 'google-acceleratedmobilepage', 'https://acceleratedmobilepageurl.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-adexchangebuyer',       'https://www.googleapis.com/discovery/v1/apis/adexchangebuyer/v1.4/rest' );
	apiapi_register_structure_google( 'google-adexchangeseller',      'https://www.googleapis.com/discovery/v1/apis/adexchangeseller/v2.0/rest' );
	apiapi_register_structure_google( 'google-admin-datatransfer',    'https://www.googleapis.com/discovery/v1/apis/admin/datatransfer_v1/rest' );
	apiapi_register_structure_google( 'google-admin-directory',       'https://www.googleapis.com/discovery/v1/apis/admin/directory_v1/rest' );
	apiapi_register_structure_google( 'google-admin-reports',         'https://www.googleapis.com/discovery/v1/apis/admin/reports_v1/rest' );
	apiapi_register_structure_google( 'google-adsense',               'https://www.googleapis.com/discovery/v1/apis/adsense/v1.4/rest' );
	apiapi_register_structure_google( 'google-adsensehost',           'https://www.googleapis.com/discovery/v1/apis/adsensehost/v4.1/rest' );
	apiapi_register_structure_google( 'google-analytics',             'https://www.googleapis.com/discovery/v1/apis/analytics/v3/rest' );
	apiapi_register_structure_google( 'google-analyticsreporting',    'https://analyticsreporting.googleapis.com/$discovery/rest?version=v4' );
	apiapi_register_structure_google( 'google-androidenterprise',     'https://www.googleapis.com/discovery/v1/apis/androidenterprise/v1/rest' );
	apiapi_register_structure_google( 'google-androidpublisher',      'https://www.googleapis.com/discovery/v1/apis/androidpublisher/v2/rest' );
	apiapi_register_structure_google( 'google-appengine',             'https://appengine.googleapis.com/$discovery/rest?version=v1beta' );
	apiapi_register_structure_google( 'google-appsactivity',          'https://www.googleapis.com/discovery/v1/apis/appsactivity/v1/rest' );
	apiapi_register_structure_google( 'google-appstate',              'https://www.googleapis.com/discovery/v1/apis/appstate/v1/rest' );
	apiapi_register_structure_google( 'google-bigquery',              'https://www.googleapis.com/discovery/v1/apis/bigquery/v2/rest' );
	apiapi_register_structure_google( 'google-blogger',               'https://www.googleapis.com/discovery/v1/apis/blogger/v3/rest' );
	apiapi_register_structure_google( 'google-books',                 'https://www.googleapis.com/discovery/v1/apis/books/v1/rest' );
	apiapi_register_structure_google( 'google-calendar',              'https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest' );
	apiapi_register_structure_google( 'google-civicinfo',             'https://www.googleapis.com/discovery/v1/apis/civicinfo/v2/rest' );
	apiapi_register_structure_google( 'google-cloudbilling',          'https://cloudbilling.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-cloudbuild',            'https://cloudbuild.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-clouddebugger',         'https://clouddebugger.googleapis.com/$discovery/rest?version=v2' );
	apiapi_register_structure_google( 'google-clouderrorreporting',   'https://clouderrorreporting.googleapis.com/$discovery/rest?version=v1beta1' );
	apiapi_register_structure_google( 'google-cloudfunctions',        'https://cloudfunctions.googleapis.com/$discovery/rest?version=v1beta2' );
	apiapi_register_structure_google( 'google-cloudkms',              'https://cloudkms.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-cloudmonitoring',       'https://www.googleapis.com/discovery/v1/apis/cloudmonitoring/v2beta2/rest' );
	apiapi_register_structure_google( 'google-cloudresourcemanager',  'https://cloudresourcemanager.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-cloudtrace',            'https://cloudtrace.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-clouduseraccounts',     'https://www.googleapis.com/discovery/v1/apis/clouduseraccounts/beta/rest' );
	apiapi_register_structure_google( 'google-compute',               'https://www.googleapis.com/discovery/v1/apis/compute/v1/rest' );
	apiapi_register_structure_google( 'google-consumersurveys',       'https://www.googleapis.com/discovery/v1/apis/consumersurveys/v2/rest' );
	apiapi_register_structure_google( 'google-content',               'https://www.googleapis.com/discovery/v1/apis/content/v2/rest' );
	apiapi_register_structure_google( 'google-customsearch',          'https://www.googleapis.com/discovery/v1/apis/customsearch/v1/rest' );
	apiapi_register_structure_google( 'google-dataflow',              'https://dataflow.googleapis.com/$discovery/rest?version=v1b3' );
	apiapi_register_structure_google( 'google-dataproc',              'https://dataproc.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-datastore',             'https://datastore.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-deploymentmanager',     'https://www.googleapis.com/discovery/v1/apis/deploymentmanager/v2/rest' );
	apiapi_register_structure_google( 'google-dfareporting',          'https://www.googleapis.com/discovery/v1/apis/dfareporting/v2.7/rest' );
	apiapi_register_structure_google( 'google-dns',                   'https://www.googleapis.com/discovery/v1/apis/dns/v2beta1/rest' );
	apiapi_register_structure_google( 'google-doubleclickbidmanager', 'https://www.googleapis.com/discovery/v1/apis/doubleclickbidmanager/v1/rest' );
	apiapi_register_structure_google( 'google-doubleclicksearch',     'https://www.googleapis.com/discovery/v1/apis/doubleclicksearch/v2/rest' );
	apiapi_register_structure_google( 'google-drive',                 'https://www.googleapis.com/discovery/v1/apis/drive/v3/rest' );
	apiapi_register_structure_google( 'google-firebasedynamiclinks',  'https://firebasedynamiclinks.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-firebaserules',         'https://firebaserules.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'google-fitness',               'https://www.googleapis.com/discovery/v1/apis/fitness/v1/rest' );
	apiapi_register_structure_google( 'google-fusiontables',          'https://www.googleapis.com/discovery/v1/apis/fusiontables/v2/rest' );

	//TODO: Add the others to the list.

}
