<?php

include_once (ROOT.'/models/Login.php');

class LoginController
{
    public function actionIndex()
    {
        require_once(ROOT.'/views/login/index.php');
        
        return true;
    }
}
