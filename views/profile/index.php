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
			<img src="https://ubistatic19-a.akamaihd.net/resource/ru-ru/game/southpark/thefracturedbutwhole/spfbw-cartman.png" class="img-circle user-avatar">
			<h3 style="width: 100%;" class="text-center">username</h3>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6"><span class="lead text-primary">Artem Trush</span></div>
				<div class="col-md-6 text-right" style="font-size: 125%;"><span>online</span></div>
			</div>
			<div class="row">
				<div class="col-md-3 user-info">
					<div>
						<label>Age</label>
						<p class="text-primary">loh</p>
					</div>
					<div>
						<label>Gender</label>
						<p class="text-primary">loh</p>
					</div>
					<div>
						<label>Sexual preferences</label>
						<p class="text-primary">loh</p>
					</div>
				</div>
				<div class="col-md-9">
					<label>Location</label>
					<div id="map-container">
						<div id="map"></div>
					</div>
				</div>
			</div>
			<div>
				<label>Fame Rate</label>
				<div class="progress">
					<div class="progress-bar" style="width: 70%;"></div>
				</div>
			</div>
			<div>
				<button type="button" class="btn btn-primary profile-button">Like</button>
				<button type="button" class="btn btn-primary profile-button" onclick="fake_report();">Report as fake</button>
				<button type="button" class="btn btn-primary profile-button">Block the user</button>
			</div>
		</div>
	</div>

	<h4 class="headline">Gallery</h4>
	<hr class="profile-hr">
	<div class="row">

		    <input id="upload_input" type="file" accept="image/*" onchange="upload_photo();">

		<div class="col-md-3">
			<img class="user-photo" src="http://www.catster.com/wp-content/uploads/2017/08/A-fluffy-cat-looking-funny-surprised-or-concerned.jpg">
		</div>
		<div class="col-md-3">
			<img class="user-photo" src="http://www.catster.com/wp-content/uploads/2017/08/A-fluffy-cat-looking-funny-surprised-or-concerned.jpg">
		</div>
		<div class="col-md-3">
			<img class="user-photo" src="http://www.catster.com/wp-content/uploads/2017/08/A-fluffy-cat-looking-funny-surprised-or-concerned.jpg">
		</div>
		<div class="col-md-3">
			<img class="user-photo" src="http://www.catster.com/wp-content/uploads/2017/08/A-fluffy-cat-looking-funny-surprised-or-concerned.jpg">
		</div>
	</div>

	<h4 class="headline">Tags</h4>
	<hr class="profile-hr">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-info user-tag">oasdmasda</div>
			<div class="alert alert-info user-tag">oasdmasda</div>
			<div class="alert alert-info user-tag">oasdmasda</div>
			<div class="alert alert-info user-tag">oasdmasda</div>
			<div class="alert alert-info user-tag">oasdmasda</div>
			<div class="alert alert-info user-tag">oasdmasda</div>
			<div class="alert alert-info user-tag">oasdmasda</div>
			<div class="alert alert-info user-tag">oasdmasda</div>
			<div class="alert alert-info user-tag">oasdmasda</div>
		</div>
	</div>

	<h4 class="headline">Biography</h4>
	<hr class="profile-hr">
	<div class="row">
		<div class="col-md-12">
			<p>
				Blah Blah  Blah  Blah  Blah Blah Blah  Blah  Blah  Blah Blah Blah  Blah  Blah  Blah Blah Blah  Blah  Blah  Blah 
			</p>
		</div>
	</div>
</div>

<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>