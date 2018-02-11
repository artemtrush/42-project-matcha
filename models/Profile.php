<?php

abstract class Profile
{
	static public function getOnlineDate($params)
	{
		foreach ($params as $value)
		{
			if (empty($value))
			{
				echo "false";
				exit;
			}
		}
		$query = "SELECT user.online FROM user WHERE user.id = :id";
		$data = array(
			':id' => $params['id']
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetch(PDO::FETCH_ASSOC);
			if (!empty($result_array['online']))
			{
				if ((time() - strtotime($result_array['online'])) <= 30)
					echo "online";
				else
					echo "was online ".date_format(date_create($result_array['online']), "H:i (d.m.y)");
				exit;
			}
		}
		echo "false";
		exit;
	}

	static public function getUserInfo($id)
	{
		$query = "SELECT * FROM user WHERE user.id = :id";
		$data = array(
			':id' => $id
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetch(PDO::FETCH_ASSOC);
			if (!empty($result_array['id']))
			{
				return $result_array;
			}
		}
		return false;
	}

	static private function deleteImage($id, $field)
	{
		$query = "SELECT user.{$field} FROM user WHERE user.id = :id";
		$data = array(
			':id' => $id
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetch(PDO::FETCH_ASSOC);
			if (!empty($result_array[$field]))
			{
				if ($result_array[$field] === '/template/img/default_avatar.png' || $result_array[$field] === '/template/img/default_image.png')
					return true;
				return unlink(ROOT.$result_array[$field]);
			}
		}
		return false;
	}

	static public function uploadPhoto($params)
	{
		$errorMessage = "Sorry, there was an error uploading your file.";
		foreach ($params as $value)
		{
			if (empty($value))
				return $errorMessage;
		}
		if (empty($_FILES["imageToUpload"]))
			return $errorMessage;

		$imagename = basename($_FILES["imageToUpload"]["name"]);
		$imageFileType = strtolower(pathinfo($imagename, PATHINFO_EXTENSION));
		// Allow certain file formats
		if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg")
			return "Only JPG, JPEG, PNG files are allowed.";
		// Check image size
		if ($_FILES["imageToUpload"]["size"] > 500000)
			return "Sorry, your file is too large.";
		// Check if image file is a actual image or fake image
		if (!getimagesize($_FILES["imageToUpload"]["tmp_name"]))
			return "File is not an image.";

		$id = $_SESSION['user_id'];
		$dir = ROOT.'/database/'.$id;
		if (!file_exists($dir))
			mkdir($dir, 0777, true);
		$filename = '/database/'.$id.'/'.$params['dbfield'].'.'.$imageFileType;
		$target_file = ROOT.$filename;

		// Try to delete previous file
		if (!self::deleteImage($id, $params['dbfield']))
			return $errorMessage;
		// Try to move file
		if (!move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file))
			return $errorMessage;
		// Save path to database
		$query = "UPDATE user SET user.{$params['dbfield']} = :file WHERE user.id = :id";
		$data = array(
			':file' => $filename,
			':id' => $id
		);
		if (DB::query($query, $data) !== false)
		{
			header('Location: /profile');
			return true;
		}
		return $errorMessage;
	}
}