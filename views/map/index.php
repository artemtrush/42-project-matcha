<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Map</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<?php include_once (ROOT.'/views/header.php');?>
<h1 class="headline">Interactive map of users</h1>
<div class="container">
	<div id="map-container" style="height: 80vh;">
		<div id="map"></div>
		<?php
			echo ("
				<script>
					var markable = false;
					document.addEventListener('DOMContentLoaded', function() {
					var timer = 1000;
			");
			foreach ($array as $value)
			{
				echo ("
					setTimeout(function() {
						var pos = new google.maps.LatLng({$value['lat']}, {$value['lng']});
						addMarker(pos, '{$value['username']}', false);
					}, timer);
					timer += 200;
				");
			}
			echo ("
					});
				</script>
			");
		?>
	</div>
</div>			



<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>