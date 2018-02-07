<?php

include_once (ROOT.'/models/Search.php');

class SearchController
{
    public function actionIndex()
    {
        require_once(ROOT.'/views/search/index.php');
        
        return true;
    }
}
