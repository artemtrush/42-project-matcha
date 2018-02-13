<?php

include_once (ROOT.'/models/Profile.php');

abstract class History
{

	static public function  getNotifications($params)
	{
		$query = "SELECT id, message FROM notification WHERE user_id = :user_id AND viewed = 0 AND id > :id";
		$data = array(
			':user_id' => $_SESSION['user_id'],
			':id' => $params['id']
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

	static public function  getHistory($id)
	{
		$query = "SELECT message, viewed FROM notification WHERE user_id = :id ORDER BY id DESC";
		$data = array(
			':id' => $id
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetchAll(PDO::FETCH_ASSOC);
			return $result_array;
		}
		return null;
	}

    static public function  setAsViewed($id)
    {
    	$query = "UPDATE notification SET viewed = 1 WHERE user_id = :id AND viewed = 0";
		$data = array(
			':id' => $id
		);
		DB::query($query, $data);
    }

	static public function createNotification($id, $msg)
	{
		if ($_SESSION['user_id'] == $id)
			return;
		if (Profile::isBlocked($id, $_SESSION['user_id']))
			return;
		$info = Profile::getUserInfo($_SESSION['user_id']);
		if (!$info)
			return;

		$user = $info['username'];
		date_default_timezone_set("Europe/Kiev");
		$time = date("H:i (d.m.y)", time());
		$msg = str_replace('_USER', $user, $msg).$time;
		$query = "INSERT INTO notification (user_id, message) VALUES (:id, :msg)";
		$data = array(
			':id' => $id,
			':msg' => $msg
		);
		DB::query($query, $data);
	}

}
