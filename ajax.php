<?php
	require_once('config.php');

	if( isset($_GET['action']) ) {
		$action = $_GET['action'];
	} else {
		$action = '';
	}


	if( $action == 'get_clientname') {
		#$query = $_GET['query'];
		$clients = $database->select("clients",'*');

		var_dump( $clients );

		$json = '';
		if( is_array($clients) ) {
			foreach( $clients AS $client ) :
				$json .= "{ id: ".$client['client_id'].", name: '".$client['client_name']."'},";
			endforeach;
			echo ( '['.$json.']' );
		}
	}

	if( $action == 'delete_job') {
		$id = $_REQUEST['id'];
		if( !empty( $id ) && $id != 0 ) {
			$data = $database->update("jobs_meta", [
				'status' => "0" //deleted
			],
			[
				'jmsid[=]' => $id,
			]);
		} else {
			return false;
		}
	}

	if( $action == 'delete_client') {
		$id = $_REQUEST['client_id'];
		if( !empty( $id ) && $id != 0 ) {
			$data = $database->update("clients", [
				'status' => "0" //deleted
			],
			[
				'client_id[=]' => $id,
			]);
			print_r( $database->log() );
		} else {
			return false;
		}
	}

	if( $action == 'delete_brand') {
		$id = $_REQUEST['brand_id'];
		if( !empty( $id ) && $id != 0 ) {
			$data = $database->update("media_brand", [
				'media_brand_status' => "0" //deleted
			],
			[
				'media_brand_id[=]' => $id,
			]);
			print_r( $database->log() );
		} else {
			return false;
		}

	}

?>