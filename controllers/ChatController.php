<?php

include_once (ROOT.'/models/Chat.php');

class ChatController
{
    public function actionView($id) {
        require_once(ROOT.'/views/chat/index.php');
        return true;
    }
}
