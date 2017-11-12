<?php

require_once dirname(dirname(__FILE__)) . '/articles.php';

class modxpo2017wsArticlesAuthor extends modxpo2017wsArticles {

    public function initialize()
    {
        $author = (int) $this->getProperty($this->primaryKeyField);
//        exit($author);
        if (!empty($author)) {
            $this->whereCondition['createdby'] = $author;
            $this->unsetProperty($this->primaryKeyField);
        }
    }

}