<?php

abstract class Registration
{
	static private function checkUsername($username)
	{
		if (!preg_match("/^[a-zA-Z0-9_-]{3,10}$/", $username))
			return false;
		$query = "SELECT user.id FROM user WHERE user.username = :uname";
		$data = array(
			':uname' => $username
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetch(PDO::FETCH_ASSOC);
			if (empty($result_array['id']))
				return true;
		}
		return false;
	}

	static public function checkPassword($password)
	{
		if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{6,15}$/", $password))
			return true;
		return false;
	}

	static public function register($params)
	{
		foreach ($params as $value)
		{
			if (empty($value) || trim($value) === "")
				return "Invalid data";
		}
		if (!self::checkUsername($params['uname']))
			return "Invalid username";
		if (!self::checkPassword($params['pass']))
			return "Invalid password";
		if ($params['pass'] !== $params['confirm'])
			return "Invalid password";
		$query = "INSERT INTO user (email, username, fname, lname, password) VALUES (:email, :username, :fname, :lname, :password)";
		$data = array(
			':email' => $params['email'], 
			':username' => $params['uname'], 
			':fname' => $params['fname'], 
			':lname' => $params['lname'], 
			':password' => encode($params['pass'])
		);
		if (DB::query($query, $data) !== false)
		{
			header ('Location: /login');
			return true;
		}
		return "An error occurred";
	}
}