<?php

include_once (ROOT.'/models/Chat.php');
include_once (ROOT.'/models/Profile.php');

class ChatController
{
    public function actionView($id) {
    	$user1 = Profile::getUserInfo($_SESSION['user_id']);
		$user2 = Profile::getUserInfo($id);
        $who = $_SESSION['user_id'];
        $whom = $id;
    	/*
		**if the user tries to open his own chat or the one with non existant user - error 404
    	*/
    	if ($id == $_SESSION['user_id'] || $user2 === false) {
    		//TODO make a proper error message
    		return false;
    	}
        /*
        **checking whether the users did not block each other and like each other
        **and whether they are not the same user
        */
        if (!Profile::isLiked($who, $whom)  || !Profile::isLiked($whom, $who)) {
            return false;
        }
        if (Profile::isBlocked($who, $whom) || Profile::isBlocked($whom, $who)) {
            return false;
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
