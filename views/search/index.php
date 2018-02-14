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
	<form class="row">
	<input type="hidden" name="model" value="Settings">
	<input type="hidden" name="function" value="updateSettings">
	<input type="hidden" id="lat" name="lat" value="">
	<input type="hidden" id="lng" name="lng" value="">
		<div style="margin-top: 50px;" class="form-group col-md-2">
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
		<div style="margin-top: 50px;" class="form-group col-md-2">
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
		<div class="form-group col-md-8"">
			<label>Location</label>
				<div id="map-container">
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
		<br>
		<div class="row">
			<button type="submit" class="btn btn-primary btn-lg col-md-2 col-md-offset-4">Search</button>
		</div>
	</form>

	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table class="table" id="myTable">
  <tr>
    <th>Name</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Berglunds snabbkop</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Koniglich Essen</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Italy</td>
  </tr>
  <tr>
    <td>North/South</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Paris specialites</td>
    <td>France</td>
  </tr>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</div>

<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>