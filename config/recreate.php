<?php

define('ROOT', dirname(__DIR__));
require_once(ROOT.'/components/PDOdatabase.php');

DB::recreate();
