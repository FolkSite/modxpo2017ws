<?php

/**
 * The home manager controller for modxpo2017ws.
 *
 */
class modxpo2017wsHomeManagerController extends modExtraManagerController
{
    /** @var modxpo2017ws $modxpo2017ws */
    public $modxpo2017ws;


    /**
     *
     */
    public function initialize()
    {
        $path = $this->modx->getOption('modxpo2017ws_core_path', null,
                $this->modx->getOption('core_path') . 'components/modxpo2017ws/') . 'model/modxpo2017ws/';
        $this->modxpo2017ws = $this->modx->getService('modxpo2017ws', 'modxpo2017ws', $path);
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('modxpo2017ws:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('modxpo2017ws');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->modxpo2017ws->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->modxpo2017ws->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->modxpo2017ws->config['jsUrl'] . 'mgr/modxpo2017ws.js');
        $this->addJavascript($this->modxpo2017ws->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->modxpo2017ws->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->modxpo2017ws->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->modxpo2017ws->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->modxpo2017ws->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->modxpo2017ws->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        modxpo2017ws.config = ' . json_encode($this->modxpo2017ws->config) . ';
        modxpo2017ws.config.connector_url = "' . $this->modxpo2017ws->config['connectorUrl'] . '";
        Ext.onReady(function() {
            MODx.load({ xtype: "modxpo2017ws-page-home"});
        });
        </script>
        ');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->modxpo2017ws->config['templatesPath'] . 'home.tpl';
    }
}