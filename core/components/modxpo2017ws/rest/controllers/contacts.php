<?php

class modxpo2017wsAbout extends modxpo2017wsBaseRestController {

    /** @{inheritDoc} */
    public function initialize()
    {
        $alias = $this->modx->getOption('modxpo2017ws_site_contacts_page');
        $this->whereCondition['alias'] = $alias;
        $this->setProperty('alias', $alias);
    }


}