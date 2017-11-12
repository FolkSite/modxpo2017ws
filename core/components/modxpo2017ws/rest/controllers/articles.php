<?php

class modxpo2017wsArticles extends modxpo2017wsBaseRestController {

    public $allowedMethods = array('get', 'post');


    /** @{inheritDoc} */
    public function initialize()
    {
        $parent = $this->modx->getOption('modxpo2017ws_site_articles_page');
        $this->whereCondition['parent'] = $parent;
        $this->setProperty('parent', $parent);
    }


}