<?php

include_once (ROOT.'/models/Search.php');

class SearchController
{
    public function actionIndex()
    {
    	$active = "search";
        require_once(ROOT.'/views/search/index.php');
        return true;
    }
}
