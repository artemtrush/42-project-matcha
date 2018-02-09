<?php

include_once (ROOT.'/models/Registration.php');

abstract class Reset
{
	static public function recover($params)
	{
		foreach ($params as $value)
		{
			if (empty($value))
				return "Invalid data";
		}
		if (!Registration::checkPassword($params['pass']))
			return "Invalid password";
		if ($params['pass'] !== $params['confirm'])
			return "Invalid password";
		
		$usermail = "!!!!!!!!";
		$query = "UPDATE user SET user.password = :pass WHERE user.email = :email";
		$data = array(
			':pass' => encode($params['pass']),
			':email' => $usermail
		);
		if (DB::query($query, $data) !== false)
		{
			header('Location: /login');
			return true;
		}
		return "An error occurred";
	}
}