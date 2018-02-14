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
	<br><br>
	<div class="row">
		<div class="col-md-2 hidden-sm hidden-xs">
			<?php echo "<img class=\"chat-img\" src=\"$user1Avatar\" alt=\"left user image\">" ?>
			<?php echo "<h2 class=\"headline\">$user1Username</h1>" ?>
		</div>
		<div class="col-md-8">
			<div class="chat-window">
			</div>
		</div>
		<div class="col-md-2 hidden-sm hidden-xs">
			<?php echo "<img class=\"chat-img\" src=\"$user2Avatar\" alt=\"right user image\">" ?>
			<?php echo "<h2 class=\"headline\">$user2Username</h1>" ?>
		</div>
	</div>
	<?php
	echo "<script type=\"text/javascript\">var whom = {$id};</script>";
?>
	<br><br>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-6">
			<textarea class="form-control chat-new-msg" maxlength="300" placeholder="Add Message"></textarea>
		</div>
		<div class="col-md-2">
			<button onclick="sendMessage()" style="height: 58px; width: 100%;" class="btn btn-primary btn-lg">Send</button>
		</div>
	</div>

</div>

<?php include_once (ROOT.'/views/footer.php');?>

<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function () {
		var data = { id: <?php echo($id);?>,
					 user_id: <?php echo($_SESSION['user_id']);?>,
			 		 index: <?php echo "0"; ?> };
		ajax_loop('Chat', 'loadMessagesFromBd', data, showMessagesInChat, 2);
	});
</script>

</body>
</html>
