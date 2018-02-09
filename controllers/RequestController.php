<?php
define('ROOT', dirname(__DIR__));
require_once(ROOT.'/config/preferences.php');
include_once(ROOT.'/components/PDOdatabase.php');
include_once(ROOT.'/components/Sendmail.php');
if (!isset($_SESSION))
	session_start();
foreach ($_POST as $value)
	$value = trim($value);

if (!empty($_POST['function']) && !empty($_POST['model']))
{
	$model = ucfirst($_POST['model']);
	$function = $model.'::'.$_POST['function'];
	$modelFile = ROOT.'/models/'.$model.'.php';
	if (file_exists($modelFile))
	{
		unset($_POST['function']);
		unset($_POST['model']);
		include_once($modelFile);
		try
		{
			$result = $function($_POST);
			if ($result !== true)
			{
				if ($result !== false)
					$_SESSION['error_message'] = $result;
				header ('Location: /'.strtolower($model)); 
			}
		}
		catch (Exception $e)
		{
		    echo $e->getMessage();
		}
		exit;
	}
}
echo 'Request error occurred.';

/* Manual
[form]
При успехе - return true;
При ошибке - return false; если пользователю ничего сообщать не нужно
			 return "message..."; выведет пользователю всплывающее сообщение.

[ajax]
ВСЕГДА return true; (иначе страница будет перезагружена)
При ошибке - echo 'false';
При успехе - echo 'какой-то результат или ничего'
*/
