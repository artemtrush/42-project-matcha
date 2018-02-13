<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Connections</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<?php include_once (ROOT.'/views/header.php');?>

<br>
<div class="container">
<div class="row">
<?php
if (!count($conns))
{
	echo("<h1 class=\"headline\">There Is Nothing, Yet...</h1>");
}
foreach ($conns as $user)
{
$online = Connections::getOnline($user['id']);
$str = <<<EOD
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
			<a href="/profile/{$user['id']}">
				<img src="{$user['avatar']}">
			</a>
			<div class="caption text-center">
				<h3>{$user['username']}</h3>
				<p>{$online}</p>
				<p><a href="/chat/{$user['id']}" class="btn btn-primary" role="button" style="width: 60%;">Chat</a></p>
			</div>
		</div>
	</div>
EOD;
echo($str);
}
?>
</div>
</div>

<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>