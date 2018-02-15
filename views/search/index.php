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
	<br>
	<br>

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
        <?php if ($searchResults !== "There is nothing yet") : ?>
        <tbody>
            <?php foreach ($searchResults as $value) {
                echo "
                    <tr>
                        <td>$value[username]</td>
                        <td>$value[age]</td>
                        <td>$value[rate]</td>
                        <td>{$_GENDER_[$value['gender']]}</td>
                        <td>{$_SEX_[$value['sex_pref']]}</td>
                    </tr>
                ";
            }
            ?>
           <!--  <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
            </tr> -->

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

<!-- <script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function () {
		var request = new XMLHttpRequest();
		var params = 'model=Search&function=showSearchResults';

		request.open('POST', '/controllers/RequestController.php');
		request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		request.send(params);
	});

    request.onload = function()
    {   
        var tbody = document.getElementsByTagName('tbody')[0];
        if (request.responseText !== 'false')
        {
            0;
        } else {
            var div = document.createElement('div');
            div.textContent = "There is nothing here yet :(";
            tbody.appendChild(div);
        }
    };
</script> -->

</body>
</html>