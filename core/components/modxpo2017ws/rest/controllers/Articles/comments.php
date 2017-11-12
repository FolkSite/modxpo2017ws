<?php

class modxpo2017wsArticlesComments extends modxpo2017wsBaseRestController {

    public function getList()
    {
        $comments = array();
        $urlParams = $this->getProperty('urlParams');
        $id = (int) $this->modx->getOption('articles', $urlParams, 0);
        if ($article = $this->getEntities($this->classKey, array('id' => $id, 'parent' => $this->modx->getOption('modxpo2017ws_site_articles_page')))) {
            $tvs = $this->getTVs($article);
            $comments = $tvs['comments'];
        }
        return $this->collection($comments, count($comments));
    }

    public function post()
    {
        $comment = array();
        $urlParams = $this->getProperty('urlParams');
        $id = (int) $this->modx->getOption('articles', $urlParams, 0);
        if ($article = $this->getEntities($this->classKey, array('id' => $id, 'parent' => $this->modx->getOption('modxpo2017ws_site_articles_page')))) {
            if ($tv = $this->modx->getObject('modTemplateVar', array('name' => 'comments'))) {
                if ($tvs = $this->modx->getObject('modTemplateVarResource', array('contentid' => $id, 'tmplvarid' => $tv->get('id')))) {
                    $comment = array('name' => $this->getProperty('name'), 'comment' => $this->getProperty('comment'));
                    $comments = $this->modx->fromJSON($tvs->get('value'));
                    if (empty($comments)) {
                        $comments = array();
                    }
//                    exit(print_r($comments, 1));
                    $comments[] = $comment;
                    $tvs->set('value', $this->modx->toJSON($comments));
                    $tvs->save();
                }
            }
        }
        return !empty($comment) ? $this->success('', $comment) : $this->failure('Error adding comment');
    }

}