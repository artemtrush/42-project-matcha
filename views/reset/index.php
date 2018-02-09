<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Reset Password</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<h1 class="headline"> Reset Password </h1>
<div class="container">
	<div class="row">
		<form method="post" action="/controllers/RequestController.php">
		<input type="hidden" name="model" value="Reset">
		<input type="hidden" name="function" value="recover">
			<div class="col-md-10 col-md-offset-1">
				<div class="form-group">
					<label>New Password</label>
					<input type="password" placeholder="Enter Password Here.." class="form-control reset-input" maxlength="15" name="pass">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" placeholder="Enter Password Here.." class="form-control reset-input" maxlength="15" name="confirm">
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
						<button type="button" class="btn btn-lg btn-danger submit-btn" onclick="redirect('login');">
							Login
						</button>	
					</div>
					<div class="col-sm-6">
						<button type="submit" class="btn btn-lg btn-success submit-btn" onclick="return fillFields('reset-input');">
							Submit
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