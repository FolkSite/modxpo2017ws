<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var modxpo2017ws $modxpo2017ws */
$modxpo2017ws = $modx->getService('modxpo2017ws', 'modxpo2017ws', $modx->getOption('modxpo2017ws_core_path', null,
        $modx->getOption('core_path') . 'components/modxpo2017ws/') . 'model/modxpo2017ws/'
);
$modx->lexicon->load('modxpo2017ws:default');

// handle request
$corePath = $modx->getOption('modxpo2017ws_core_path', null, $modx->getOption('core_path') . 'components/modxpo2017ws/');
$path = $modx->getOption('processorsPath', $modxpo2017ws->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));