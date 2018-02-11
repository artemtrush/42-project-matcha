<?php

//General settings
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connecting files
define('ROOT', __DIR__);
require_once(ROOT.'/config/preferences.php');
require_once (ROOT.'/components/Router.php');
include_once(ROOT.'/components/PDOdatabase.php');
include_once(ROOT.'/components/Sendmail.php');

if (!isset($_SESSION))
	session_start();
//logout
//unset($_SESSION['user_id']);
//Call Router
$router = new Router();
$router->run();
