<?php

include_once (ROOT.'/models/Chat.php');
include_once (ROOT.'/models/Profile.php');

class ChatController
{
    public function actionView($id) {
    	$user1 = Profile::getUserInfo($_SESSION['user_id']);
		$user2 = Profile::getUserInfo($id);
    	/*
		**if the user tries to open his own chat or the one with non existant user - exit
    	*/
    	if ($id == $_SESSION['user_id'] || $user2 === false) {
    		//TODO make a proper error message
    		exit;
    	}
		//getting variables needed for the page
		$user1Avatar = $user1['avatar'];
		$user2Avatar = $user2['avatar'];
		$user1Username = $user1['username'];
		$user2Username = $user2['username'];


        require_once(ROOT.'/views/chat/index.php');
        return true;
    }
}
