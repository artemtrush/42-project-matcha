<?php

include_once (ROOT.'/models/Search.php');
include_once (ROOT.'/models/Profile.php');

class SearchController
{
    public function actionView() {
    	$active = "search";
    	//getting the current user data from the bd
		$user = Profile::getUserInfo($_SESSION['user_id']);

		if (!isset($_SESSION['filters'])) {
			$filters = array(
				'lat' => $user['location_x'],
				'lng' => $user['location_y'],
				'age' => $user['age'],
				'rate' => 1
			);
		} else {
			$filters = $_SESSION['filters'];
			unset($_SESSION['filters']);
		}

    	$searchResults = Search::showSearchResults($filters, $user);
    	global $_GENDER_;
    	global $_SEX_;
    	global $_TAG_;
        require_once(ROOT.'/views/search/index.php');
        return true;
    }
}
