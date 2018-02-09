<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Login</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<h1 class="headline"> Login Form </h1>
<div class="container">
	<div class="row">
		<form method="post" action="/controllers/RequestController.php">
		<input type="hidden" name="model" value="Login">
		<input type="hidden" name="function" value="authentication">
			<div class="col-md-10 col-md-offset-1">								
				<div class="form-group">
					<label>Username</label>
					<input type="text" placeholder="Enter Username Here.." class="form-control login-input" maxlength="10" name="username">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" placeholder="Enter Password Here.." class="form-control login-input" maxlength="15" name="pass">
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
						<button type="button" class="btn btn-lg btn-danger submit-btn" onclick="redirect('registration');">
							Registration
						</button>	
					</div>
					<div class="col-sm-6">
						<button type="submit" class="btn btn-lg btn-success submit-btn" onclick="return fillFields('login-input');">
							Submit
						</button>	
					</div>
				</div>		
			</div>
		</form>
	</div>
	<br><br>
	<div class="row">
		<form method="post" action="/controllers/RequestController.php">
		<input type="hidden" name="model" value="Login">
		<input type="hidden" name="function" value="">
			<div class="col-md-10 col-md-offset-1">		
				<div class="row">
					<div class="col-md-8 form-group">
						<label>Email Address</label>
						<input type="email" placeholder="Enter Email Address Here.." class="form-control forgot-input" maxlength="100" name="email">
					</div>	
					<div class="col-md-4" style="padding-top: 25px;">
						<button type="submit" class="btn btn-primary submit-btn" onclick="return fillFields('forgot-input');">Forgot Password</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php include_once (ROOT.'/views/footer.php');?>
</body>
</html>