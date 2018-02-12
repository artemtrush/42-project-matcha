<?php

abstract class Connections
{
	static public function getOnline($id)
	{
		$query = "SELECT user.online FROM user WHERE user.id = :id";
		$data = array(
			':id' => $id
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetch(PDO::FETCH_ASSOC);
			if (!empty($result_array['online']))
			{
				date_default_timezone_set("Europe/Kiev");
				if ((time() - strtotime($result_array['online'])) <= 30)
					return "online";
				else
					return "was online ".date_format(date_create($result_array['online']), "H:i (d.m.y)");
			}
		}
		return "";
	}

	static private function getBlocked($id)
	{
		$blocked = array();
		$query = "SELECT whom FROM blacklist WHERE who = :id";
		$data = array(
			':id' => $id,
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result_array as $value)
			{
				$blocked[] = $value['whom'];
			}
		}
		return $blocked;
	}

	static public function getConnections()
	{
		$id = $_SESSION['user_id'];
		$query = "SELECT who, whom FROM likes WHERE who = :id1 OR whom = :id2";
		$data = array(
			':id1' => $id,
			':id2' => $id
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetchAll(PDO::FETCH_ASSOC);
			$i_liked = array();
			$liked_me = array();
			foreach ($result_array as $value)
			{
				if ($value['who'] == $id)
					$i_liked[] = $value['whom'];
				else
					$liked_me[] = $value['who'];
			}
			$conn = array_intersect($i_liked, $liked_me);
			return array_diff($conn, self::getBlocked($id));
		}
		return null;
	}
}