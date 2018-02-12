<?php

include_once (ROOT.'/models/History.php');

class HistoryController
{
    public function actionIndex()
    {
    	$active = "history";
        require_once(ROOT.'/views/history/index.php');
        return true;
    }
}
