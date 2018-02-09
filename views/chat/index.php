<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Chat</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<?php include_once (ROOT.'/views/header.php');?>

<div class="container">
	<div class="row">
		<div class="col-md-2">
			<img src="http://mynameismatthieu.com/WOW/img/wow-12.gif" alt="lhs">
		</div>
		<div class="col-md-8">
			<div style="height: 800px; border:2px solid black">Some chat text</div>
		</div>
		<div class="col-md-2">
			<img src="http://mynameismatthieu.com/WOW/img/wow-12.gif" alt="rhs">
		</div>
	</div>

	<form>
		<div class="row">
			<div class="form-group">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<textarea class="form-control" placeholder="Add Message"></textarea>
				</div>
			</div>
			<div class="col-md-2">
				<button class="btn btn-primary btn-lg">Send</button>
			</div>
		</div>
	</form>

</div>

<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>
