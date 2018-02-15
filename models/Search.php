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

		if ($user['gender'] == 0) {
			if ($user['sex_pref'] == 1) {
				$query = "SELECT * FROM user
							WHERE id != :id
							AND ((gender = 1 AND sex_pref = 1) OR (gender = 1 AND sex_pref = 0))";
			} else if ($user['sex_pref'] == 2) {
				$query = "SELECT * FROM user
							WHERE id != :id
							AND gender = 0
							AND sex_pref = 2";
			} else {
				$query = "SELECT * FROM user
							WHERE id != :id
							AND
							(gender = 0 AND sex_pref = 2)
							OR (gender = 1 AND sex_pref = 1)
							OR (gender = 1 AND sex_pref = 0)
							OR (gender = 0 AND sex_pref = 0)";
			}
		} else {
			if ($user['sex_pref'] == 1) {
				$query = "SELECT * FROM user
							WHERE id != :id
							AND gender = 0
							AND sex_pref = 1";
			} else if ($user['sex_pref'] == 2) {
				$query = "SELECT * FROM user
							WHERE id != :id
							AND gender = 1
							AND sex_pref = 2";
			} else {
				$query = "SELECT * FROM user
							WHERE (id != :id) 			   AND
							((gender = 0 AND sex_pref = 1) OR
							(gender = 1 AND sex_pref = 2)  OR
							(gender = 1 AND sex_pref = 0)  OR
							(gender = 0 AND sex_pref = 0))";
			}
		}

		$data = array(
			':id' => $_SESSION['user_id']
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetchAll(PDO::FETCH_ASSOC);
			return $result_array;
		}
		return "There is nothing yet";
	}
}
