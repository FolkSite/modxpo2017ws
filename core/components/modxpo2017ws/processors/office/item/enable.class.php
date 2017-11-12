<?php

class modxpo2017wsOfficeItemEnableProcessor extends modObjectProcessor
{
    public $objectType = 'modxpo2017wsItem';
    public $classKey = 'modxpo2017wsItem';
    public $languageTopics = array('modxpo2017ws');
    //public $permission = 'save';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('modxpo2017ws_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var modxpo2017wsItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('modxpo2017ws_item_err_nf'));
            }

            $object->set('active', true);
            $object->save();
        }

        return $this->success();
    }

}

return 'modxpo2017wsOfficeItemEnableProcessor';
