
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chosen.jquery.js"></script>
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src="js/datepicker.min.js"></script>
	<script src="js/datepicker.en.js"></script>
	<script src="js/bootstrap-timepicker.js"></script>
	<script src="js/jquery-treed.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	<script src="js/script.js"></script>
  </body>
</html>

<?php
	if( $debug == true) {
		echo '<hr><p>DB LOG:</p>';
		var_dump( $database->log() );
		echo '<hr><p>POST:</p>';
		var_dump( $_POST );
		echo '<hr><p>SESSION:</p>';
		var_dump( $_SESSION );
		echo '<hr><p>GET:</p>';
		var_dump( $_GET );
		echo '<hr><p>COOKIE:</p>';
		var_dump( $_COOKIE );
	}
?>
