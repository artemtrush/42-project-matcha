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
}