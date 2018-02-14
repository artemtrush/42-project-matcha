<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Search</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>

<?php include_once (ROOT.'/views/header.php');?>

<div class="container">
	<form class="form-inline">
	<input type="hidden" name="model" value="Settings">
	<input type="hidden" name="function" value="updateSettings">
	<input type="hidden" id="lat" name="lat" value="">
	<input type="hidden" id="lng" name="lng" value="">
		<div class="form-group">
			<label>Age</label>
			<select name="age" class="form-control">
				<?php
					echo("<option value=\"18\" selected>18</option>");
					for ($i = 19; $i < 100; $i++)
					{
						echo("<option value=\"{$i}\">{$i}</option>");
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Rate</label>
			<select name="rate" class="form-control">
				<?php
					echo("<option value=\"0\" selected>0</option>");
					for ($i = 1; $i < 100; $i++)
					{
						echo("<option value=\"{$i}\">{$i}</option>");
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Location</label>
				<div id="map-container" style="height: 500px; width: 500px;">
					<div id="map"></div>
					<?php
						echo ("
						<script>
							var x_pos = 50.468818;
							var y_pos = 30.4600373;
							var uname = \"Choose position\";
							var markable = true;
						</script>
						");
					?>
				</div>
		</div>
		<button type="submit" class="btn btn-primary">Search</button>
		<div class="row">
			<?php
				global $_TAG_;
				foreach ($_TAG_ as $key => $value)
				{
					$name = "tag".($key + 1);
					echo("
					<div class=\"form-check col-md-4\">
						<input name=\"{$name}\" class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"{$name}\">
						<label class=\"form-check-label\" for=\"{$name}\">
					    	{$value}
						</label>
					</div>
					");
				}
			?>
		</div>
	</form>
</div>

<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>