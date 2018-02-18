<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Not Found</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<?php 
	if (!empty($_SESSION['user_id']))
		include_once (ROOT.'/views/header.php');
	else
	{
		echo("
			<script>
			    setTimeout(function() {
			        location.pathname = '/login';
			    }, 5000);
			</script>
		");
	}
?>

<div class="container text-center">
    <img src="/template/img/notFound.png" style="width: 70%; margin-top: 6%;">
</div>

<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>