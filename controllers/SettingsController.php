<?php

include_once (ROOT.'/models/Settings.php');

class SettingsController
{
    public function actionIndex()
    {
        require_once(ROOT.'/views/settings/index.php');

        return true;
    }
}
