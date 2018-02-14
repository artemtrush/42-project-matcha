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

	static public function loadMessagesFromBd($params) {
		$query = "SELECT * FROM chat
				  WHERE ((who = :who AND whom = :whom) OR (who = :who1 AND whom = :whom1))
				  AND id > :id";
		$data = array(
			':who' => $_SESSION['user_id'], 
			':whom' => $params['id'],
			':who1' => $params['id'], 
			':whom1' => $_SESSION['user_id'],
			':id' => $params['index']
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($result_array);
			return true;
		}
		echo 'false';
		exit;
	}
}
