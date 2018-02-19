<?php

include_once (ROOT.'/models/Profile.php');

abstract class Search {
	// |x2 - x1| + |y2 - y1| -> min
	static public function showSearchResults() {
		$user = Profile::getUserInfo($_SESSION['user_id']);

		/*sex_pref
		**1 - hetero
		**2 - homo
		**0 - bi

		**gender
		**1 - female
		**0 - male
		*/

		$opposite_gender = 1 - $user['gender'];
		switch ($user['sex_pref']) {
			case 0:
				$gender_cond = "gender = 0 OR gender = 1";
				$sex_pref_cond = "sex_pref = 0 
								OR (sex_pref = 1 AND gender = {$opposite_gender}) 
								OR (sex_pref = 2 AND gender = {$user['gender']})";
				break;
 			case 1:
				$gender_cond = "gender = {$opposite_gender}";
				$sex_pref_cond = "sex_pref = 0 OR sex_pref = 1";
				break;
			case 2:
				$gender_cond = "gender = {$user['gender']}";
				$sex_pref_cond = "sex_pref = 0 OR sex_pref = 2";
				break;
		}

		$query = "SELECT * FROM user WHERE id != :id AND ({$gender_cond}) AND ({$sex_pref_cond})";
		$data = array(
			':id' => $user['id']
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetchAll(PDO::FETCH_ASSOC);
			return $result_array;
		}
		return "There is no match for you :(";
	}

	static public function manualUserSearch($params) {

		$age = $params['age'];   unset($params['age']);
		$rate = $params['rate']; unset($params['rate']);
		$xPos = $params['xPos']; unset($params['xPos']);
		$yPos = $params['yPos']; unset($params['yPos']);

		$tags = array();
		foreach ($params as $value) {
			if ($value === "true") {
				$tags = "AND ".$value;
			}
		}
		$tag1 = $params['tag1'];
		$tag2 = $params['tag2'];
		$tag3 = $params['tag3'];
		$tag4 = $params['tag4'];
		$tag5 = $params['tag5'];
		$tag6 = $params['tag6'];
		$tag7 = $params['tag7'];
		$tag8 = $params['tag8'];
		$tag9 = $params['tag9'];

		if ($tag1 != "false") {
			echo "1";
		} else
			echo "0";
		return true;
		$query = "SELECT * FROM user WHERE id != :id AND age = :age AND rate >= :rate";
		$data = array(
			':id' => $_SESSION['user_id'],
			':age' => $params['age'],
			':rate' => $params['rate']
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($result_array);
			return true;
		}
		echo "false";
		exit;
	}
}
