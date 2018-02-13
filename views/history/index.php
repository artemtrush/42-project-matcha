<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>History</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<?php include_once (ROOT.'/views/header.php');?>
<br><br>
<div class="container">
	<div class="row">
	<div class="col-md-10 col-md-offset-1">
	<ul class="list-group">
		<?php
			if (!count($notifs))
			{
				echo("<h1 class=\"headline\">There Is Nothing, Yet...</h1>");
			}
			foreach ($notifs as $value)
			{
				$msg = "<span>".substr($value['message'], 0, -16)."</span>".
					"<span class=\"li-ntf-time\">".substr($value['message'], -16)."</span>";
				if ($value['viewed'])
					echo("<li class=\"list-group-item li-ntf\">{$msg}</li>");
				else
					echo("<li class=\"list-group-item list-group-item-info li-ntf\">{$msg}</li>");
			}
		?>
	</ul>
	</div>
</div>
<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>