<?php

class modxpo2017wsOfficeItemGetProcessor extends modObjectGetProcessor
{
    public $objectType = 'modxpo2017wsItem';
    public $classKey = 'modxpo2017wsItem';
    public $languageTopics = array('modxpo2017ws:default');
    //public $permission = 'view';


    /**
     * We doing special check of permission
     * because of our objects is not an instances of modAccessibleObject
     *
     * @return mixed
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        return parent::process();
    }

}

return 'modxpo2017wsOfficeItemGetProcessor';