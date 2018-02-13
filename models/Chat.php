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
		//getting the needed variables
		$who = $_SESSION['user_id'];
		$whom = $params['whom'];
		/*
		**checking whether the users did not block each other and like each other
		**and whether they are not the same user
		*/
		if (!Profile::isLiked($who, $whom)  || !Profile::isLiked($whom, $who)) {
			exit;
		}
		if (Profile::isBlocked($who, $whom) || Profile::isBlocked($whom, $who)) {
			exit;
		}

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
