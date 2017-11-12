<?php
// Boot up MODX
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';

$modx = new modX();
$modx->initialize('web');
$modx->getService('error','error.modError', '', '');
header("Access-Control-Allow-Origin: *");
// Boot up any service classes or packages (models) you will need
$path = $modx->getOption('modxpo2017ws.core_path', null,
        $modx->getOption('core_path').'components/modxpo2017ws/') . 'model/modxpo2017ws/';
/** @var modxpo2017ws $modxpo2017ws */
$modxpo2017ws = $modx->getService('modxpo2017ws', 'modxpo2017ws', $path);
// Load the modRestService class and pass it some basic configuration
/** @var modRestService $rest */
$rest = $modx->getService('rest', 'modxpo2017wsRestService', $modxpo2017ws->config['corePath'] . 'model/modxpo2017ws/', array(
    'basePath' => $modxpo2017ws->config['corePath'] . 'rest/controllers/',
    'controllerClassSeparator' => '',
    'controllerClassPrefix' => 'modxpo2017ws',
    'xmlRootNode' => 'response',
));
require_once $modxpo2017ws->config['corePath'] . 'rest/basecontroller.php';
// Prepare the request
$rest->prepare();
// Make sure the user has the proper permissions, send the user a 401 error if not
if (!$rest->checkPermissions()) {
    $rest->sendUnauthorized(true);
}
// Run the request
$rest->process();