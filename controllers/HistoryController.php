<?php

include_once (ROOT.'/models/History.php');

class HistoryController
{
    public function actionIndex()
    {
    	$notifs = History::getHistory($_SESSION['user_id']);
    	History::setAsViewed($_SESSION['user_id']);
    	$active = "history";
        require_once(ROOT.'/views/history/index.php');
        return true;
    }
}
