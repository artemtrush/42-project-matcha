<?php

include_once (ROOT.'/models/Search.php');
include_once (ROOT.'/models/Profile.php');

class SearchController
{
    public function actionView() {
    	$active = "search";
        $user = Profile::getUserInfo($_SESSION['user_id']);

        // var_dump($_SESSION['filters']);
		if (!isset($_SESSION['filters'])) {
			$filters = array();
			$filters[] = "";
		} else {
			$filters = $_SESSION['filters'];
			unset($_SESSION['filters']);
		}

    	$searchResults = Search::showSearchResults($filters);
		foreach ($searchResults as $key => $value) {
			$x = pow($value['location_x'] - $user['location_x'], 2);
			$y = pow($value['location_y'] - $user['location_y'], 2);
			$res = $x + $y;
			$searchResults[$key]['dist'] = $res;
		}
    	global $_GENDER_;
    	global $_SEX_;
    	global $_TAG_;
        require_once(ROOT.'/views/search/index.php');
        return true;
    }
}
