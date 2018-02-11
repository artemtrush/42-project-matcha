<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Profile</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<?php include_once (ROOT.'/views/header.php');?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php if ($access): ?>
				<img src="<?php echo($avatar);?>" class="img-circle user-avatar upload-photo"
					onclick="document.getElementById('avatar-input').click();" title="Upload image">
			<?php else: ?>
			  	<img src="<?php echo($avatar);?>" class="img-circle user-avatar">
			<?php endif; ?>
			<h3 style="width: 100%;" class="text-center"><?php echo($username);?></h3>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6"><span class="lead text-primary">
					<?php echo($fname);?> <?php echo($lname);?></span>
				</div>
				<div class="col-md-6 text-right" style="font-size: 125%;">
					<span id="online-span"></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 user-info">
					<div>
						<label>Age</label>
						<p class="text-primary"><?php echo($age);?></p>
					</div>
					<div>
						<label>Gender</label>
						<p class="text-primary"><?php echo($gender);?></p>
					</div>
					<div>
						<label>Sexual preferences</label>
						<p class="text-primary"><?php echo($sex_pref);?></p>
					</div>
				</div>
				<div class="col-md-9">
					<label>Location</label>
					<div id="map-container">
						<div id="map"></div>
						<?php 
							echo ("
							<script>
								var x_pos = {$x_pos};
								var y_pos = {$y_pos};
								var uname = \"{$username}\";
							</script>
							");
						?>
					</div>
				</div>
			</div>
			<div>
				<label>Fame Rate</label>
				<div class="progress">
					<div class="progress-bar" style="width: <?php echo($rate)?>%;"></div>
				</div>
			</div>
			<?php if (!$access): ?>
				<div>
					<button type="button" class="btn btn-primary profile-button">Like</button>
					<button type="button" class="btn btn-primary profile-button" onclick="fake_report();">Report as fake</button>
					<button type="button" class="btn btn-primary profile-button">Block the user</button>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<h4 class="headline">Gallery</h4>
	<hr class="profile-hr">
	<div class="row">
		<?php if ($access): ?>
			<div class="col-md-3">
				<img class="user-photo upload-photo" src="<?php echo($image1);?>"
					onclick="document.getElementById('image1-input').click();" title="Upload image">
			</div>
			<div class="col-md-3">
				<img class="user-photo upload-photo" src="<?php echo($image2);?>"
					onclick="document.getElementById('image2-input').click();" title="Upload image">
			</div>
			<div class="col-md-3">
				<img class="user-photo upload-photo" src="<?php echo($image3);?>"
					onclick="document.getElementById('image3-input').click();" title="Upload image">
			</div>
			<div class="col-md-3">
				<img class="user-photo upload-photo" src="<?php echo($image4);?>"
					onclick="document.getElementById('image4-input').click();" title="Upload image">
			</div>
		<?php else: ?>
			<div class="col-md-3">
				<img class="user-photo" src="<?php echo($image1);?>">
			</div>
			<div class="col-md-3">
				<img class="user-photo" src="<?php echo($image2);?>">
			</div>
			<div class="col-md-3">
				<img class="user-photo" src="<?php echo($image3);?>">
			</div>
			<div class="col-md-3">
				<img class="user-photo" src="<?php echo($image4);?>">
			</div>
		<?php endif; ?>
	</div>

	<h4 class="headline">Tags</h4>
	<hr class="profile-hr">
	<div class="row">
		<div class="col-md-12">
			<?php
				foreach ($tag as $value)
				{
					echo ("<div class=\"alert alert-info user-tag\">".$value."</div>");
				}
			?>
		</div>
	</div>

	<h4 class="headline">Biography</h4>
	<hr class="profile-hr">
	<div class="row">
		<div class="col-md-12">
			<p>
				<?php echo($biography);?>
			</p>
		</div>
	</div>
</div>

<?php include_once (ROOT.'/views/footer.php');?>
<? if ($access): ?>
	<form id="avatar-form" action="/controllers/RequestController.php" method="post" enctype="multipart/form-data" class="upload-form">
		<input type="hidden" name="model" value="Profile">
		<input type="hidden" name="function" value="uploadPhoto">
		<input type="hidden" name="dbfield" value="avatar">
		<input id="avatar-input" name="imageToUpload" type="file" accept="image/*" onchange="document.getElementById('avatar-form').submit();">
	</form>

	<form id="image1-form" action="/controllers/RequestController.php" method="post" enctype="multipart/form-data" class="upload-form">
		<input type="hidden" name="model" value="Profile">
		<input type="hidden" name="function" value="uploadPhoto">
		<input type="hidden" name="dbfield" value="image1">
		<input id="image1-input" name="imageToUpload" type="file" accept="image/*" onchange="document.getElementById('image1-form').submit();">
	</form>

	<form id="image2-form" action="/controllers/RequestController.php" method="post" enctype="multipart/form-data" class="upload-form">
		<input type="hidden" name="model" value="Profile">
		<input type="hidden" name="function" value="uploadPhoto">
		<input type="hidden" name="dbfield" value="image2">
		<input id="image2-input" name="imageToUpload" type="file" accept="image/*" onchange="document.getElementById('image2-form').submit();">
	</form>

	<form id="image3-form" action="/controllers/RequestController.php" method="post" enctype="multipart/form-data" class="upload-form">
		<input type="hidden" name="model" value="Profile">
		<input type="hidden" name="function" value="uploadPhoto">
		<input type="hidden" name="dbfield" value="image3">
		<input id="image3-input" name="imageToUpload" type="file" accept="image/*" onchange="document.getElementById('image3-form').submit();">
	</form>

	<form id="image4-form" action="/controllers/RequestController.php" method="post" enctype="multipart/form-data" class="upload-form">
		<input type="hidden" name="model" value="Profile">
		<input type="hidden" name="function" value="uploadPhoto">
		<input type="hidden" name="dbfield" value="image4">
		<input id="image4-input" name="imageToUpload" type="file" accept="image/*" onchange="document.getElementById('image4-form').submit();">
	</form>
<? endif; ?>

<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function () {
		var data = { id: <?php echo($id);?> };
		ajax_loop('Profile', 'getOnlineDate', data, online_status, 5);
	});
</script>

</body>
</html>