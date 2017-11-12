<?php

class modxpo2017wsOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'modxpo2017wsItem';
    public $classKey = 'modxpo2017wsItem';
    public $languageTopics = array('modxpo2017ws');
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('modxpo2017ws_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
            $this->modx->error->addField('name', $this->modx->lexicon('modxpo2017ws_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'modxpo2017wsOfficeItemCreateProcessor';