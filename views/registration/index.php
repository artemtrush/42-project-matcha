<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Registration</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/template/js/fillFields.js"></script>
</head>
<body>
<h1 class="headline"> Registration Form </h1>
<div class="container">
	<div class="row">
		<form id="registration-form" method="post" action="/controllers/RequestController.php">
		<input type="hidden" name="model" value="Registration">
		<input type="hidden" name="function" value="">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-sm-6 form-group">
						<label>First Name</label>
						<input type="text" placeholder="Enter First Name Here.." class="form-control reg-input" name="fname">
					</div>
					<div class="col-sm-6 form-group">
						<label>Last Name</label>
						<input type="text" placeholder="Enter Last Name Here.." class="form-control reg-input" name="lname">
					</div>
				</div>									
				<div class="form-group">
					<label>Username</label>
					<input type="text" placeholder="Enter Username Here.." class="form-control reg-input" name="uname">
				</div>		
				<div class="form-group">
					<label>Email Address</label>
					<input type="email" placeholder="Enter Email Address Here.." class="form-control reg-input" name="email">
				</div>	
				<div class="row">
					<div class="col-sm-6 form-group">
						<label>Password</label>
						<input type="password" placeholder="Enter Password Here.." class="form-control reg-input" name="pass">
					</div>
					<div class="col-sm-6 form-group">
						<label>Confirm Password</label>
						<input type="password" placeholder="Enter Password Here.." class="form-control reg-input" name="confirm">
					</div>
				</div>
				<br>		
				<button type="submit" class="btn btn-lg btn-success submit-btn" onclick="return fillFields('reg-input');">Submit</button>			
			</div>
		</form>
	</div>
</div>

<?php include_once (ROOT.'/views/footer.php');?>
</body>
</html>