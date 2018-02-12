<?php

include_once (ROOT.'/models/Settings.php');
include_once (ROOT.'/models/Profile.php');

class SettingsController
{
    public function actionIndex()
    {
    	$info = Profile::getUserInfo($_SESSION['user_id']);
    	$active = "settings";
        require_once(ROOT.'/views/settings/index.php');
        return true;
    }
}
