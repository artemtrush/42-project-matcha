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
		if (empty($_SESSION['reset_email']))
			return "Invalid data";
		if (!Registration::checkPassword($params['pass']))
			return "Invalid password";
		if ($params['pass'] !== $params['confirm'])
			return "Invalid password";
		$query = "UPDATE user SET user.password = :pass WHERE user.email = :email";
		$data = array(
			':pass' => encode($params['pass']),
			':email' => $_SESSION['reset_email']
		);
		if (DB::query($query, $data) !== false)
		{
			unset($_SESSION['reset_email']);
			header('Location: /login');
			return true;
		}
		return "An error occurred";
	}
}