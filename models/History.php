<?php

abstract class History
{

	static private function alreadyCreated($msg)
	{
		$query = "SELECT id FROM notification WHERE message = :msg";
		$data = array(
			':msg' => $msg
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetch(PDO::FETCH_ASSOC);
			if (!empty($result_array['id']))
				return true;
		}
		return false;
	}

	static public function createNotification($id, $msg)
	{
		if ($_SESSION['user_id'] == $id)
			return;
		$info = Profile::getUserInfo($_SESSION['user_id']);
		if (!$info)
			return;

		$user = $info['username'];
		date_default_timezone_set("Europe/Kiev");
		$time = date("H:i (d.m.y)", time());
		$msg = str_replace('_USER', $user, $msg);
		$msg = str_replace('_TIME', $time, $msg);
		// if (self::alreadyCreated($msg))
		// 	return;
		$query = "INSERT INTO notification (user_id, message) VALUES (:id, :msg)";
		$data = array(
			':id' => $id,
			':msg' => $msg
		);
		DB::query($query, $data);
	}

}
