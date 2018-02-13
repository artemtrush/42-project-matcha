<?php

include_once (ROOT.'/models/Profile.php');
include_once (ROOT.'/models/History.php');

abstract class Chat {
	static public function saveMessageToBd($params) {
		foreach ($params as $value) {
			if (empty($value) || trim($value) === ""){
				exit;
			}
		}
		//getUserInfo
		//isBlocked
		//isLiked
		// if (!self::checkUsername($params['uname']))
		// 	return "Invalid username";
		// if (!self::checkPassword($params['pass']))
		// 	return "Invalid password";
		// if ($params['pass'] !== $params['confirm'])
		// 	return "Invalid password";

		$query = "INSERT INTO chat (who, whom, message) VALUES (:who, :whom, :message)";
		$data = array(
			':who' => $_SESSION['user_id'], 
			':whom' => $params['whom'], 
			':message' => $params['msg'] 
		);
		if (DB::query($query, $data) !== false)
		{
			History::createNotification($params['whom'], NEW_MESSAGE);
			return true;
		}
		return "An error has occurred";
   }
}
