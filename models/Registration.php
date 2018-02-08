<?php

abstract class Registration
{
	static private function checkUsername($username)
	{
		
		return true;
	}

	static private function checkPassword($password)
	{

		return true;
	}

	static public function register($params)
	{
		foreach ($params as $value)
		{
			if (empty($value))
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
			':password' => sha1($params['pass'])
		);
		if (DB::query($query, $data) !== false)
		{
			header ('Location: /login');
			exit;
		}
		return "An error occurred";
	}
}