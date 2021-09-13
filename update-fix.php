<?php
	exit();
	require_once('config.php');
	include_once('header.php');

	$tblname = 'jobs_meta';

	$master_loops = $database->select($tblname, "*" );
	var_dump('<pre>'.$master_loops.'</pre>');

	foreach ($master_loops as $data ) {

		$total_waste_sqft = (( $data['waste_size_w_in'] * $data['waste_size_l_in'] ) / 144);
		$total_media_used_sqft = (( $data['media_used_w_in'] * $data['media_used_l_in'] ) / 144);

		$r = $database->update(
			$tblname,
			[
				'total_waste_sqft' => $total_waste_sqft,
				'total_media_used_sqft' => $total_media_used_sqft
			],
			[
				"jmsid" => $data['jmsid']
			]
			);
	}

	echo '<pre>';
	var_dump( $database->log() );
	echo '</pre>';
?>