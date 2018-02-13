<?php

abstract class Settings
{
	static public function updateSettings($params)
	{
		if (empty(trim($params['fname'])) || empty(trim($params['lname']))
			|| empty(trim($params['email'])) || empty(trim($params['biography'])))
				return 'Invalid data';

		$query = "UPDATE user SET
			fname = :fname,
			lname = :lname,
			email = :email,
			age = :age,
			gender = :gender,
			sex_pref = :sex_pref,
			biography = :biography,
			location_x = :lat,
			location_y = :lng";

		for ($i = 1; $i <= 9; $i++)
		{ 
			if (isset($params["tag{$i}"]))
				$query = $query.", tag{$i} = 1";
			else
				$query = $query.", tag{$i} = 0";
		}
		$query = $query." WHERE user.id = :id";
		$data = array(
			':fname' => $params['fname'],
			':lname' => $params['lname'],
			':email' => $params['email'],
			':age' => $params['age'],
			':gender' => $params['gender'],
			':sex_pref' => $params['sex_pref'],
			':biography' => $params['biography'],
			':lat' => $params['lat'],
			':lng' => $params['lng'],
			':id' => $_SESSION['user_id']
		);

		if (DB::query($query, $data) !== false)
		{
			return "Settings have been saved";
		}
		return "An error occurred";
	}
}