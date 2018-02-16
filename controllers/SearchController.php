<?php

include_once (ROOT.'/models/Search.php');

class SearchController
{
    public function actionView() {
    	$active = "search";
    	$searchResults = Search::showSearchResults();
    	global $_GENDER_;
    	global $_SEX_;
    	global $_TAG_;
    	
        require_once(ROOT.'/views/search/index.php');
        return true;
    }
}
