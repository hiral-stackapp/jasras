<?php
	$pageTitle = "Logout";
	require_once('config.php');

	include_once("header.php");
	include_once("menu.php");
?>

	<div class="container">
		<h1>Logout</h1>
	</div><!-- /.container -->

	<?php
		session_destroy();
		header( "location: ".SITEURL );
	?>




<?php
	include_once("footer.php");
?>