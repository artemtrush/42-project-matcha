<?php

abstract class Map
{
	static public function getMap()
	{
		$query = "SELECT username, location_x as lat, location_y as lng FROM user";
		$data = array();
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetchAll(PDO::FETCH_ASSOC);
			return $result_array;
		}
		return false;
	}
}