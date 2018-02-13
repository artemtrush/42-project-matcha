<?php

include_once (ROOT.'/models/Chat.php');
include_once (ROOT.'/models/Profile.php');

class ChatController
{
    public function actionView($id) {
    	//peremennie dlya otobrazheniya na str
        require_once(ROOT.'/views/chat/index.php');
        return true;
    }
}
