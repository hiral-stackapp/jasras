<?php
	$pageTitle = "Home";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');
?>


<div class="container">
	<div class="row">
		<h1>Home Page</h1>
	</div>
</div><!-- /.container -->



<?php
	include_once("footer.php");
?>
