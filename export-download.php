<?php

	ini_set('memory_limit', '-1');

	ob_get_clean();

	$objPHPExcel = PHPExcel_IOFactory::load("DMCR-Report-Template.xlsx");

	$objPHPExcel->setActiveSheetIndex(0);

	$objPHPExcel->getProperties()->setCreator("Imran Sayed");

	$objPHPExcel->getProperties()->setLastModifiedBy("Imran Sayed");

	$objPHPExcel->getProperties()->setTitle("Jasras DMCR SpreadSheet");

	$objPHPExcel->getProperties()->setSubject("Print Report");

	$objPHPExcel->getProperties()->setDescription("");



	$row = $objPHPExcel->getActiveSheet()->getHighestRow()+1;



	$results2 = $database->select(

			$file[0]['tbl_child'],

			[

				"[>]".$file[0]['tbl_parent'] => ["job_id" => "job_id"],

				"[>]clients" => [ $file[0]['tbl_child'].".client_id" => "client_id" ],

				"[>]density" => [ $file[0]['tbl_child'].".density_id" => "density_id" ],

				"[>]media_group" => [ $file[0]['tbl_child'].".media_group_id" => "media_group_id" ],

				"[>]media_type" => [ $file[0]['tbl_child'].".media_type_id" => "media_type_id" ],

				"[>]platform" => [ $file[0]['tbl_child'].".platform_id" => "platform_id" ],

				"[>]print_mode" => [ $file[0]['tbl_child'].".prnt_mode_id" => "prnt_mode_id" ],

				"[>]print_quality" => [ $file[0]['tbl_child'].".prnt_qlty_id" => "prnt_qlty_id" ],

				"[>]print_type" => [ $file[0]['tbl_child'].".prnt_type_id" => "prnt_type_id" ],

				"[>]shutter_mode" => [ $file[0]['tbl_child'].".shutter_mode_id" => "shutter_mode_id" ],

				"[>]print_speed" => [ $file[0]['tbl_child'].".prnt_speed_id" => "prnt_speed_id" ],

				"[>]carraige" => [ $file[0]['tbl_child'].".carriage_id" => "carriage_id" ],

				"[>]rip_station" => [ $file[0]['tbl_child'].".station_id" => "station_id" ],

				"[>]passes" => [ $file[0]['tbl_child'].".pass_id" => "pass_id" ],

				"[>]curing" => [ $file[0]['tbl_child'].".curing_id" => "curing_id" ],

				"[>]profile_env" => [ $file[0]['tbl_child'].".profile_id" => "profile_id" ],

				"[>]machine" => [ $file[0]['tbl_child'].".machine_id" => "machine_id" ],

				"[>]user" => [ $file[0]['tbl_child'].".user_id" => "uid" ]

			],



			'*',

			$subquery

		);



	foreach( $results2 AS $result ):

		$rowData[] = array(

	    	date('d-m-Y', strtotime($result['job_date'].'00:00:00')),

				// $result['job_start_time'],

				// $result['job_end_time'],

				date('h:i A', strtotime('0000-00-00 '.$result['job_start_time'])),

				date('h:i A', strtotime('0000-00-00 '.$result['job_end_time'])),

				$result['job_id'],

				$result['client_name'],

				$result['rtl_id'],

				$result['prnt_type_name'],

				$result['prnt_size_w_in'],

				$result['prnt_size_l_in'],

				$result['prnt_size_sqft'],

				$result['no_copies'],

				$result['total_print_sqft'],

				// $result['waste_size_w_in'],

				// $result['waste_size_l_in'],

				// $result['total_waste_sqft'],

				$result['media_type_name'],

				$result['roll_number'],

				$result['platform_type_name'],

				$result['media_used_w_in'],

				$result['media_used_l_in'],

				$result['total_media_w_ft'],

				$result['total_media_l_ft'],

				$result['total_media_used_sqft'],

				// $result['total_media_waste_w'],

				// $result['total_media_waste_h'],

				// $result['total_media_waste_b'],

				// $result['total_media_wastage_sqft'],

				$result['density_name'],

				$result['prnt_speed_status'],

				$result['prnt_mode_name'],

				$result['direction'],

				$result['prnt_qlty_name'],

				$result['carriage_h_mm'],

				$result['profile_label'],

				$result['pass_label'],

				$result['curing_label'],

				$result['shutter_mode_name'],

				$result['station_label'],

				$result['ink_used_rtl'],

				$result['total_ink_used'],

				$result['prnt_time'],

				$result['total_prnt_time'],

				$result['machine_label'],

				$result['fullname'].' ('.$result['loginid'].')' );

	endforeach;



	$filename_surfix = '';

	if( $client_id != '0' ) {

			$filename_surfix .= "-".$result['client_name'];

	}

	if( $machine_id != '0' ) {

			$filename_surfix .= "-".$result['machine_label'];

	}



	$filename = "DMCR-JASRAS".$filename_surfix.".xlsx";



	$objPHPExcel->getActiveSheet()->fromArray($rowData, null, 'A'.$row);

	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

	#$objWriter->save($filename);



	/** Set header information **/

	header('Content-Type: application/vnd.ms-excel');

	header('Content-Disposition: attachment;filename="'.$filename.'"');

	header('Cache-Control: max-age=0');

	$objWriter->save('php://output');



	ob_end_flush();

?>