<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Settings</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<?php include_once (ROOT.'/views/header.php');?>

<div class="container">
	<br><br><br>
	<div class="row">
		<form id="registration-form" method="post" action="/controllers/RequestController.php">
		<input type="hidden" name="model" value="Settings">
		<input type="hidden" name="function" value="updateSettings">
		<input type="hidden" id="lat" name="lat" value="">
		<input type="hidden" id="lng" name="lng" value="">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-6 form-group">
						<label>First Name</label>
						<input type="text" placeholder="Enter First Name Here.." value="<?php echo($info['fname']);?>" 
							class="form-control" name="fname" maxlength="32" required>
					</div>
					<div class="col-md-6 form-group">
						<label>Last Name</label>
						<input type="text" placeholder="Enter Last Name Here.." value="<?php echo($info['lname']);?>"
							class="form-control" name="lname" maxlength="32" required>
					</div>
				</div>									
				<div class="form-group">
					<label>Email Address</label>
					<input type="email" placeholder="Enter Email Address Here.." value="<?php echo($info['email']);?>"
						class="form-control" name="email" maxlength="100" required>
				</div>
				<div class="row">
					<div class="col-md-4 form-group">
						<label>Age</label>
						<select name="age" class="form-control">
							<?php
								for ($i = 18; $i < 100; $i++)
								{
									if ($i == $info['age'])
										echo("<option value=\"{$i}\" selected>{$i}</option>");
									else
										echo("<option value=\"{$i}\">{$i}</option>");
								}
							?>
						</select>
					</div>
					<div class="col-md-4 form-group">
						<label>Gender</label>
						<select name="gender" class="form-control">
							<?php
								global $_GENDER_;
								foreach ($_GENDER_ as $key => $value)
								{
									if ($key == $info['gender'])
										echo("<option value=\"{$key}\" selected>{$value}</option>");
									else
										echo("<option value=\"{$key}\">{$value}</option>");
								}
							?>
						</select>
					</div>
					<div class="col-md-4 form-group">
						<label>Sexual preferences</label>
						<select name="sex_pref" class="form-control">
							<?php
								global $_SEX_;
								foreach ($_SEX_ as $key => $value)
								{
									if ($key == $info['sex_pref'])
										echo("<option value=\"{$key}\" selected>{$value}</option>");
									else
										echo("<option value=\"{$key}\">{$value}</option>");
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>Tags</label>
					<div class="row">
					<?php
						global $_TAG_;
						foreach ($_TAG_ as $key => $value)
						{
							$name = "tag".($key + 1);
							$check = ($info[$name]) ? "checked" : "";
							echo("
							<div class=\"form-check col-md-4\">
								<input name=\"{$name}\" class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"{$name}\" {$check}>
								<label class=\"form-check-label\" for=\"{$name}\">
							    	{$value}
								</label>
							</div>
							");
						}
					?>
					</div>
				</div>
				<div class="form-group">
					<label>Biography</label>
					<textarea name="biography" required class="form-control" maxlength="500" style="resize: none; height: 130px;"><?php echo($info['biography']);?></textarea>
				</div>
				<div class="form-group">
					<label>Location</label>
						<div id="map-container" style="height: 500px;">
							<div id="map"></div>
							<?php
								echo ("
								<script>
									var x_pos = {$info['location_x']};
									var y_pos = {$info['location_y']};
									var uname = \"{$info['username']}\";
									var markable = true;
								</script>
								");
							?>
						</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6  col-md-offset-3">
						<button type="submit" class="btn btn-lg btn-primary submit-btn">
							Save
						</button>	
					</div>
				</div>			
			</div>
		</form>
	</div>
</div>

<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>