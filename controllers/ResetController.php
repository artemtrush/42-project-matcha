<?php

include_once (ROOT.'/models/Reset.php');

class ResetController
{
    public function actionIndex()
    {
        require_once(ROOT.'/views/reset/index.php');
        
        return true;
    }
}
