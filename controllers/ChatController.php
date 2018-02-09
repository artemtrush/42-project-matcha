<?php

include_once (ROOT.'/models/Chat.php');

class ChatController
{
    public function actionView() {
    	$active = "";
        require_once(ROOT.'/views/chat/index.php');
        
        return true;
    }
}
