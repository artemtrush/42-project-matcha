<?php
$str = <<<EOD
	<script type="text/javascript" src="/template/js/ajax_loop.js"></script>
	<script type="text/javascript" src="/template/js/error_message.js"></script>
	<script type="text/javascript" src="/template/js/fillFields.js"></script>
	<script type="text/javascript" src="/template/js/redirect.js"></script>
	<script type="text/javascript" src="/template/js/upload_photo.js"></script>
	<script type="text/javascript" src="/template/js/fake_report.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&;;sensor=false"></script>
	<script type="text/javascript" src="/template/js/location.js"></script>
EOD;
echo ($str);

//Reporting error to user
if (!empty($_SESSION['error_message']))
{

$str = <<<EOD
	<script type="text/javascript">
	 	window.onload = function () {
	 		error_message("{$_SESSION['error_message']}");
	 	};
	</script>
EOD;
echo ($str);
unset($_SESSION['error_message']);

}
