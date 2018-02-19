<?php

abstract class Login
{
	static public function authentication($params)
	{
		foreach ($params as $value)
		{
			if (empty($value))
				return "Invalid data";
		}

		$query = "SELECT user.id FROM user WHERE user.username = :uname  AND user.password = :pass";
		$data = array(
			':uname' => $params['username'],
			':pass' => encode($params['pass'])
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetch(PDO::FETCH_ASSOC);
			if (!empty($result_array['id']))
			{
				$_SESSION['user_id'] = $result_array['id'];
				header ('Location: /profile');
				return true;
			}
			return "Invalid data";
		}
		return "An error occurred";
	}

	static public function logout()
	{
		if (isset($_SESSION['user_id']))
			unset($_SESSION['user_id']);
		header ('Location: /login');
		return true;
	}

	static public function forgot($params)
	{
		foreach ($params as $value)
		{
			if (empty($value))
				return "Invalid data";
		}

		$query = "SELECT user.id FROM user WHERE user.email = :email";
		$data = array(
			':email' => $params['email']
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetch(PDO::FETCH_ASSOC);
			if (!empty($result_array['id']))
			{
				$link = DOMAIN."/reset/".encode(encode($params['email']));
				sendmail($params['email'], "Link for matcha password reset: ".PHP_EOL.$link);
				$_SESSION['reset_email'] = $params['email'];
				return "The password reset link was sent to your email";
			}
			return "User not found";
		}
		return "An error occurred";
	} 
}