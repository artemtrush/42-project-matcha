<?php

include_once (ROOT.'/models/Reset.php');

class ResetController
{
    public function actionIndex($hash)
    {
    	if (empty($_SESSION['reset_email']))
    		return false;
    	if ($hash !== encode(encode($_SESSION['reset_email'])))
    		return false;
        require_once(ROOT.'/views/reset/index.php');
        return true;
    }
}
