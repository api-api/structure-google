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
		$name = 'google-' . $name;

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

	apiapi_register_structure_google( 'acceleratedmobilepage', 'https://acceleratedmobilepageurl.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'adexchangebuyer',       'https://www.googleapis.com/discovery/v1/apis/adexchangebuyer/v1.4/rest' );
	apiapi_register_structure_google( 'adexchangeseller',      'https://www.googleapis.com/discovery/v1/apis/adexchangeseller/v2.0/rest' );
	apiapi_register_structure_google( 'admin-datatransfer',    'https://www.googleapis.com/discovery/v1/apis/admin/datatransfer_v1/rest' );
	apiapi_register_structure_google( 'admin-directory',       'https://www.googleapis.com/discovery/v1/apis/admin/directory_v1/rest' );
	apiapi_register_structure_google( 'admin-reports',         'https://www.googleapis.com/discovery/v1/apis/admin/reports_v1/rest' );
	apiapi_register_structure_google( 'adsense',               'https://www.googleapis.com/discovery/v1/apis/adsense/v1.4/rest' );
	apiapi_register_structure_google( 'adsensehost',           'https://www.googleapis.com/discovery/v1/apis/adsensehost/v4.1/rest' );
	apiapi_register_structure_google( 'analytics',             'https://www.googleapis.com/discovery/v1/apis/analytics/v3/rest' );
	apiapi_register_structure_google( 'analyticsreporting',    'https://analyticsreporting.googleapis.com/$discovery/rest?version=v4' );
	apiapi_register_structure_google( 'androidenterprise',     'https://www.googleapis.com/discovery/v1/apis/androidenterprise/v1/rest' );
	apiapi_register_structure_google( 'androidpublisher',      'https://www.googleapis.com/discovery/v1/apis/androidpublisher/v2/rest' );
	apiapi_register_structure_google( 'appengine',             'https://appengine.googleapis.com/$discovery/rest?version=v1beta' );
	apiapi_register_structure_google( 'appsactivity',          'https://www.googleapis.com/discovery/v1/apis/appsactivity/v1/rest' );
	apiapi_register_structure_google( 'appstate',              'https://www.googleapis.com/discovery/v1/apis/appstate/v1/rest' );
	apiapi_register_structure_google( 'bigquery',              'https://www.googleapis.com/discovery/v1/apis/bigquery/v2/rest' );
	apiapi_register_structure_google( 'blogger',               'https://www.googleapis.com/discovery/v1/apis/blogger/v3/rest' );
	apiapi_register_structure_google( 'books',                 'https://www.googleapis.com/discovery/v1/apis/books/v1/rest' );
	apiapi_register_structure_google( 'calendar',              'https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest' );
	apiapi_register_structure_google( 'civicinfo',             'https://www.googleapis.com/discovery/v1/apis/civicinfo/v2/rest' );
	apiapi_register_structure_google( 'cloudbilling',          'https://cloudbilling.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'cloudbuild',            'https://cloudbuild.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'clouddebugger',         'https://clouddebugger.googleapis.com/$discovery/rest?version=v2' );
	apiapi_register_structure_google( 'clouderrorreporting',   'https://clouderrorreporting.googleapis.com/$discovery/rest?version=v1beta1' );
	apiapi_register_structure_google( 'cloudfunctions',        'https://cloudfunctions.googleapis.com/$discovery/rest?version=v1beta2' );
	apiapi_register_structure_google( 'cloudkms',              'https://cloudkms.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'cloudmonitoring',       'https://www.googleapis.com/discovery/v1/apis/cloudmonitoring/v2beta2/rest' );
	apiapi_register_structure_google( 'cloudresourcemanager',  'https://cloudresourcemanager.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'cloudtrace',            'https://cloudtrace.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'clouduseraccounts',     'https://www.googleapis.com/discovery/v1/apis/clouduseraccounts/beta/rest' );
	apiapi_register_structure_google( 'compute',               'https://www.googleapis.com/discovery/v1/apis/compute/v1/rest' );
	apiapi_register_structure_google( 'consumersurveys',       'https://www.googleapis.com/discovery/v1/apis/consumersurveys/v2/rest' );
	apiapi_register_structure_google( 'content',               'https://www.googleapis.com/discovery/v1/apis/content/v2/rest' );
	apiapi_register_structure_google( 'customsearch',          'https://www.googleapis.com/discovery/v1/apis/customsearch/v1/rest' );
	apiapi_register_structure_google( 'dataflow',              'https://dataflow.googleapis.com/$discovery/rest?version=v1b3' );
	apiapi_register_structure_google( 'dataproc',              'https://dataproc.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'datastore',             'https://datastore.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'deploymentmanager',     'https://www.googleapis.com/discovery/v1/apis/deploymentmanager/v2/rest' );
	apiapi_register_structure_google( 'dfareporting',          'https://www.googleapis.com/discovery/v1/apis/dfareporting/v2.7/rest' );
	apiapi_register_structure_google( 'dns',                   'https://www.googleapis.com/discovery/v1/apis/dns/v2beta1/rest' );
	apiapi_register_structure_google( 'doubleclickbidmanager', 'https://www.googleapis.com/discovery/v1/apis/doubleclickbidmanager/v1/rest' );
	apiapi_register_structure_google( 'doubleclicksearch',     'https://www.googleapis.com/discovery/v1/apis/doubleclicksearch/v2/rest' );
	apiapi_register_structure_google( 'drive',                 'https://www.googleapis.com/discovery/v1/apis/drive/v3/rest' );
	apiapi_register_structure_google( 'firebasedynamiclinks',  'https://firebasedynamiclinks.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'firebaserules',         'https://firebaserules.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'fitness',               'https://www.googleapis.com/discovery/v1/apis/fitness/v1/rest' );
	apiapi_register_structure_google( 'fusiontables',          'https://www.googleapis.com/discovery/v1/apis/fusiontables/v2/rest' );
	apiapi_register_structure_google( 'games',                 'https://www.googleapis.com/discovery/v1/apis/games/v1/rest' );
	apiapi_register_structure_google( 'games-configuration',   'https://www.googleapis.com/discovery/v1/apis/gamesConfiguration/v1configuration/rest' );
	apiapi_register_structure_google( 'games-management',      'https://www.googleapis.com/discovery/v1/apis/gamesManagement/v1management/rest' );
	apiapi_register_structure_google( 'genomics',              'https://genomics.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'gmail',                 'https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest' );
	apiapi_register_structure_google( 'groups-migration',      'https://www.googleapis.com/discovery/v1/apis/groupsmigration/v1/rest' );
	apiapi_register_structure_google( 'groups-settings',       'https://www.googleapis.com/discovery/v1/apis/groupssettings/v1/rest' );
	apiapi_register_structure_google( 'container',             'https://www.googleapis.com/discovery/v1/apis/container/v1/rest' );
	apiapi_register_structure_google( 'iam',                   'https://iam.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'identity-toolkit',      'https://www.googleapis.com/discovery/v1/apis/identitytoolkit/v3/rest' );
	apiapi_register_structure_google( 'kgsearch',              'https://kgsearch.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'language',              'https://language.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'licensing',             'https://www.googleapis.com/discovery/v1/apis/licensing/v1/rest' );
	apiapi_register_structure_google( 'logging',               'https://logging.googleapis.com/$discovery/rest?version=v2' );
	apiapi_register_structure_google( 'manufacturers',         'https://manufacturers.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'mirror',                'https://www.googleapis.com/discovery/v1/apis/mirror/v1/rest' );
	apiapi_register_structure_google( 'ml',                    'https://ml.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'monitoring',            'https://monitoring.googleapis.com/$discovery/rest?version=v3' );
	apiapi_register_structure_google( 'oauth2',                'https://www.googleapis.com/discovery/v1/apis/oauth2/v2/rest' );
	apiapi_register_structure_google( 'pagespeedonline',       'https://www.googleapis.com/discovery/v1/apis/pagespeedonline/v2/rest' );
	apiapi_register_structure_google( 'partners',              'https://partners.googleapis.com/$discovery/rest?version=v2' );
	apiapi_register_structure_google( 'people',                'https://people.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'play-movies-partners',  'https://playmoviespartner.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'plus',                  'https://www.googleapis.com/discovery/v1/apis/plus/v1/rest' );
	apiapi_register_structure_google( 'plus-domains',          'https://www.googleapis.com/discovery/v1/apis/plusDomains/v1/rest' );
	apiapi_register_structure_google( 'prediction',            'https://www.googleapis.com/discovery/v1/apis/prediction/v1.6/rest' );
	apiapi_register_structure_google( 'proximity-beacon',      'https://proximitybeacon.googleapis.com/$discovery/rest?version=v1beta1' );
	apiapi_register_structure_google( 'pub-sub',               'https://pubsub.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'qpx-express',           'https://www.googleapis.com/discovery/v1/apis/qpxExpress/v1/rest' );
	apiapi_register_structure_google( 'replica-pool',          'https://www.googleapis.com/discovery/v1/apis/replicapool/v1beta2/rest' );
	apiapi_register_structure_google( 'replica-pool-updater',  'https://www.googleapis.com/discovery/v1/apis/replicapoolupdater/v1beta1/rest' );
	apiapi_register_structure_google( 'reseller',              'https://www.googleapis.com/discovery/v1/apis/reseller/v1/rest' );
	apiapi_register_structure_google( 'resource-views',        'https://www.googleapis.com/discovery/v1/apis/resourceviews/v1beta2/rest' );
	apiapi_register_structure_google( 'runtime-config',        'https://runtimeconfig.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'safe-browsing',         'https://safebrowsing.googleapis.com/$discovery/rest?version=v4' );
	apiapi_register_structure_google( 'script',                'https://script.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'search-console',        'https://searchconsole.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'service-control',       'https://servicecontrol.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'service-management',    'https://servicemanagement.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'service-user',          'https://serviceuser.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'sheets',                'https://sheets.googleapis.com/$discovery/rest?version=v4' );
	apiapi_register_structure_google( 'site-verification',     'https://www.googleapis.com/discovery/v1/apis/siteVerification/v1/rest' );
	apiapi_register_structure_google( 'slides',                'https://slides.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'source-repo',           'https://sourcerepo.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'spanner',               'https://spanner.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'spectrum',              'https://www.googleapis.com/discovery/v1/apis/spectrum/v1explorer/rest' );
	apiapi_register_structure_google( 'speech',                'https://speech.googleapis.com/$discovery/rest?version=v1beta1' );
	apiapi_register_structure_google( 'sql-admin',             'https://www.googleapis.com/discovery/v1/apis/sqladmin/v1beta4/rest' );
	apiapi_register_structure_google( 'storage',               'https://www.googleapis.com/discovery/v1/apis/storage/v1/rest' );
	apiapi_register_structure_google( 'storage-transfer',      'https://storagetransfer.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'surveys',               'https://www.googleapis.com/discovery/v1/apis/surveys/v2/rest' );
	apiapi_register_structure_google( 'tag-manager',           'https://www.googleapis.com/discovery/v1/apis/tagmanager/v2/rest' );
	apiapi_register_structure_google( 'task-queue',            'https://www.googleapis.com/discovery/v1/apis/taskqueue/v1beta2/rest' );
	apiapi_register_structure_google( 'tasks',                 'https://www.googleapis.com/discovery/v1/apis/tasks/v1/rest' );
	apiapi_register_structure_google( 'tool-results',          'https://www.googleapis.com/discovery/v1/apis/toolresults/v1beta3/rest' );
	apiapi_register_structure_google( 'tracing',               'https://tracing.googleapis.com/$discovery/rest?version=v2' );
	apiapi_register_structure_google( 'translate',             'https://www.googleapis.com/discovery/v1/apis/translate/v2/rest' );
	apiapi_register_structure_google( 'url-shortener',         'https://www.googleapis.com/discovery/v1/apis/urlshortener/v1/rest' );
	apiapi_register_structure_google( 'vision',                'https://vision.googleapis.com/$discovery/rest?version=v1' );
	apiapi_register_structure_google( 'webfonts',              'https://www.googleapis.com/discovery/v1/apis/webfonts/v1/rest' );
	apiapi_register_structure_google( 'webmasters',            'https://www.googleapis.com/discovery/v1/apis/webmasters/v3/rest' );
	apiapi_register_structure_google( 'youtube',               'https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest' );
	apiapi_register_structure_google( 'youtube-analytics',     'https://www.googleapis.com/discovery/v1/apis/youtubeAnalytics/v1/rest' );
	apiapi_register_structure_google( 'youtube-reporting',     'https://youtubereporting.googleapis.com/$discovery/rest?version=v1' );

}
