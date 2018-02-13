<?php

include_once (ROOT.'/models/History.php');
include_once (ROOT.'/models/Profile.php');

class ProfileController
{
	private function parseInfo($info, $access)
	{
		if (!$info)
			return false;
		global $_GENDER_;
		global $_SEX_;
		global $_TAG_;

		$id = $info['id'];
		$username = $info['username'];
		$fname = $info['fname'];
		$lname = $info['lname'];
		$age = $info['age'];
		$gender = ucfirst($_GENDER_[$info['gender']]);
		$sex_pref = ucfirst($_SEX_[$info['sex_pref']]);
		$biography = $info['biography'];
		$avatar = $info['avatar'];
		$image1 = $info['image1'];
		$image2 = $info['image2'];
		$image3 = $info['image3'];
		$image4 = $info['image4'];
		$rate = $info['rate'];
		$x_pos = $info['location_x'];
		$y_pos = $info['location_y'];
		$tag = array();
		for ($i = 1; $i <= 9; $i++)
		{ 
			if ($info['tag'.$i])
				$tag[] = $_TAG_[$i - 1];
		}
		if (!empty($info['active']))
			$active = 'profile';
		require_once(ROOT.'/views/profile/index.php');
		return true;
	}

    public function actionIndex()
    {
    	$info = Profile::getUserInfo($_SESSION['user_id']);
    	if (!$info)
			return false;
		$info['active'] = 'profile';
    	return $this->parseInfo($info, true);
    }

    public function actionView($id)
    {
    	if ($id == $_SESSION['user_id'])
    		return $this->actionIndex();
    	$info = Profile::getUserInfo($id);
    	if (!$info)
			return false;
    	$info['liked'] = Profile::isLiked($_SESSION['user_id'], $id);
    	$info['blocked'] = Profile::isBlocked($_SESSION['user_id'], $id);
    	History::createNotification($id, VIEW_PROFILE);
    	return $this->parseInfo($info, false);
    }
}
