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
		<div class="col-md-2">
			<img class="chat-img" src="http://mynameismatthieu.com/WOW/img/wow-12.gif" alt="lhs">
			<div class="alert alert-info">username</div>
		</div>
		<div class="col-md-8">
			<div class="chat-window">
				<div class="well col-md-9">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vestibulum, ligula sit amet aliquam tincidunt, neque augue laoreet eros, ut maximus tortor mauris nec ligula. Cras dapibus diam a lectus efficitur rhoncus. Proin ac mattis mi. Duis suscipit sit amet lacus a tincidunt. Nam vulputate sem augue, tempor hendrerit nisi pretium et. Integer maximus mauris enim, sed efficitur quam vulputate vel. Maecenas vitae sapien erat. Vivamus suscipit bibendum magna nec tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit.

Vestibulum eget mi eu elit viverra condimentum non in est. In fermentum, tellus eget rutrum bibendum, est nibh porttitor metus, ut ultricies leo velit quis elit. Morbi placerat ultrices velit, pellentesque viverra quam congue et. Curabitur mollis porttitor imperdiet. Donec luctus nisi varius urna gravida, ut hendrerit risus laoreet. Aliquam venenatis semper nunc, nec bibendum arcu tempus nec. Integer tincidunt ante eros, non blandit enim vestibulum sed. In convallis sem ac sapien fermentum posuere. Duis et dignissim orci. Praesent auctor, libero at pharetra faucibus, nisl nulla sodales mi, eget viverra ipsum sem nec erat. Nulla feugiat metus vitae egestas hendrerit. Duis consequat auctor dolor quis maximus. Nullam eleifend ex non ultricies dignissim. Fusce euismod risus ac iaculis aliquam. Vivamus iaculis ligula nec feugiat ullamcorper.

Nunc ornare lacus eu turpis sagittis, at aliquet eros lacinia. Proin interdum erat nec pellentesque tincidunt. Aliquam luctus, metus quis pretium tristique, magna ex molestie mi, et convallis dolor orci sit amet neque. In tincidunt dignissim congue. Vivamus quis iaculis mi. In auctor quis urna ut ullamcorper. Sed arcu enim, venenatis sit amet rhoncus eu, ornare tempor enim. Morbi justo nibh, vulputate non nulla ac, mattis lacinia dui. Nam augue massa, malesuada sed convallis lacinia, pulvinar vel eros.

Aenean felis orci, efficitur in turpis quis, pretium faucibus nisi. Etiam aliquet turpis nunc, quis ornare erat finibus et. Vestibulum hendrerit posuere dictum. Aenean lobortis sem dolor, eu rhoncus mi imperdiet eget. Praesent hendrerit lectus id ex dapibus efficitur. Duis pretium magna vitae fringilla accumsan. Nullam diam ligula, ullamcorper a pretium eu, pretium eu purus.

Praesent luctus dui commodo porttitor bibendum. Sed pretium ante quis condimentum euismod. Ut faucibus suscipit augue ut pulvinar. Cras id volutpat neque. Sed nunc nibh, elementum eu fermentum in, porta ut velit. Ut id feugiat nibh. Vivamus ornare ipsum a risus scelerisque, quis lobortis nibh elementum.
				</div>
				<div class="well col-md-9 col-md-offset-3">
					huy
				</div>
				<div class="well col-md-9">
					test msg 3
				</div>
				<div class="well col-md-9 col-md-offset-3">
					Nunc ornare lacus eu turpis sagittis, at aliquet eros lacinia. Proin interdum erat nec pellentesque tincidunt. Aliquam luctus, metus quis pretium tristique, magna ex molestie mi, et convallis dolor orci sit amet neque. In tincidunt dignissim congue. Vivamus quis iaculis mi. In auctor quis urna ut ullamcorper. Sed arcu enim, venenatis sit amet rhoncus eu, ornare tempor enim. Morbi justo nibh, vulputate non nulla ac, mattis lacinia dui. Nam augue massa, malesuada sed convallis lacinia, pulvinar vel eros.
				</div>
			</div>
		</div>
		<div class="col-md-2">
			<img class="chat-img" src="http://mynameismatthieu.com/WOW/img/wow-12.gif" alt="rhs">
			<div class="alert alert-info">username</div>
		</div>
	</div>

	<br><br>
	<form>
		<div class="form-group row">
			<div class="col-md-2"></div>
			<div class="col-md-6">
				<textarea class="form-control chat-new-msg" placeholder="Add Message"></textarea>
			</div>
			<div class="col-md-2">
				<button class="btn btn-primary btn-lg">Send Message</button>
			</div>
		</div>
	</form>

</div>

<?php include_once (ROOT.'/views/footer.php');?>

</body>
</html>
