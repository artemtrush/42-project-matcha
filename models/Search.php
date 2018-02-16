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
		return "There is nothing yet";
	}
}
