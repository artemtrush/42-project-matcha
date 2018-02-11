<nav class="navbar navbar-inverse">
	<div class="container">
		<ul class="nav navbar-nav">
			<li <?php if (!empty($active) && $active === "profile") echo "class=\"active\"";?> >
				<a href="/profile"><span class="glyphicon glyphicon-home"></span> Profile</a>
			</li>
			<li <?php if (!empty($active) && $active === "settings") echo "class=\"active\"";?> >
				<a href="/settings "><span class="glyphicon glyphicon-user"></span> Account Settings</a>
			</li>
			<li <?php if (!empty($active) && $active === "search") echo "class=\"active\"";?> >
				<a href="/search "><span class="glyphicon glyphicon-search"></span> Search</a>
			</li>
		</ul>
		<form id="logout-form" method="post" action="/controllers/RequestController.php">
		<input type="hidden" name="model" value="Login">
		<input type="hidden" name="function" value="logout">
			<ul class="nav navbar-nav navbar-right">
				<li onclick="document.getElementById('logout-form').submit();"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</form>
	</div>
</nav>