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
        <input type="hidden" id="lat" name="lat" value="">
        <input type="hidden" id="lng" name="lng" value="">
		<div style="margin-top: 50px;" class="form-group col-md-2">
			<label>Age</label>
			<select id="age" name="age" class="form-control">
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
			<select id="rate" name="rate" class="form-control">
				<?php
					echo("<option value=\"1\" selected>1</option>");
					for ($i = 2; $i < 100; $i++)
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
						<input name=\"{$name}\" class=\"form-check-input searchTags\" type=\"checkbox\" value=\"\" id=\"{$name}\">
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
			<button type="button" onclick="manualUserSearch()" class="btn btn-primary btn-lg col-md-2 col-md-offset-4">Search</button>
		</div>
	</form>
	<br>
	<br>

    <div class="well row">
        <a style="color: black; text-decoration: none; font-size: 24px;" class="text-center center-block" href="/map">Click Here to Check the Map of Users</a>
    </div>
    <br><br>
    <table id="resultsTable" class="table table-striped table-inverse table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Age</th>
                <th>Fame Rate</th>
                <th>Gender</th>
                <th>Sexual Preferences</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Username</th>
                <th>Age</th>
                <th>Fame Rate</th>
                <th>Gender</th>
                <th>Sexual Preferences</th>
            </tr>
        </tfoot>
        <?php if ($searchResults !== "There is no match for you :(") : ?>
        <tbody>
            <?php foreach ($searchResults as $value) {
                echo "
                    <tr>
                        <td><a class=\"search-link\"href=\"/profile/{$value['id']}\">{$value['username']}</a></td>
                        <td>{$value['age']}</td>
                        <td>{$value['rate']}</td>
                        <td>{$_GENDER_[$value['gender']]}</td>
                        <td>{$_SEX_[$value['sex_pref']]}</td>
                    </tr>
                ";
            }
            ?>
        </tbody>
    <?php endif; ?>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() { $('#resultsTable').DataTable(); });
</script>

<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>