<?php
define('ROOT', dirname(__DIR__));
include_once(ROOT.'/components/PDOdatabase.php');
include_once(ROOT.'/components/Sendmail.php');

if (isset($_POST['function']) && !empty($_POST['function'])
	&& isset($_POST['model']) && !empty($_POST['model']))
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
			$function($_POST);
		}
		catch (Exception $e)
		{
		    echo $e->getMessage();
		}
		exit;
	}
}
echo 'Request error occurred.';