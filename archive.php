<?php
	require_once('config.php');
	include_once('header.php');


	#$year = date('Y', strtotime( date('Y').' -1 year' ) );
	#var_dump( $year );

	$time = new DateTime('now');
	$newtime = $time->modify('-1 year')->format('Y');

	$database->query( "RENAME TABLE sjobs TO _sjobs_".$newtime );
	$database->query( "RENAME TABLE sjobs_meta TO _sjobs_meta_".$newtime );

	$database->query( "CREATE TABLE sjobs LIKE _sjobs_".$newtime );
	$database->query( "CREATE TABLE sjobs_meta LIKE _sjobs_meta_".$newtime );

	$database->insert("tbl_selector",
		[
			"tbl_parent" => "sjobs_".$newtime,
			"tbl_child" => "sjobs_meta_".$newtime,
			"tbl_year" => $newtime
		]
	);

	var_dump( $database->log() );
	var_dump( $database->error() );
?>