<?php

	require_once('config.php');

	include_once('header.php');



	#var_dump( $_REQUEST );



	$client_id = $_REQUEST['client_id'];

	$machine_id = $_REQUEST['machine_id'];

	$year = $_REQUEST['year'];

	$action = $_REQUEST['action'];

	$file = $database->select( "tbl_selector", "*", [ "tbl_id" => $year ] );

	// Sub Query

	$subquery = "";

	if( $client_id != '0' && $machine_id != '0' ) {

		$subquery = array(

			"AND" => [

				$file[0]['tbl_child'].".client_id" => $client_id,

				$file[0]['tbl_child'].".machine_id" => $machine_id ]

		);

	} elseif( $client_id != '0' && $machine_id >= '0' ) {

		$subquery = array(

			$file[0]['tbl_child'].".client_id" => $client_id,

		);

	} elseif( $client_id >= '0' && $machine_id != '0' ) {

		$subquery = array(

			$file[0]['tbl_child'].".machine_id" => $machine_id,

		);

	}







	if( $action == 'search' ) {

		sleep(2);

		$results = $database->count(

			$file[0]['tbl_child'],



			[

				"[>]".$file[0]['tbl_parent'] => ["job_id" => "job_id"]

			],



			'*',

			$subquery

		);



		echo $results;

	}



	if( $action == 'view' ) {



		$results = $database->select(

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

		#__dump( $results );



		if( $results ) :

?>



<table width="100%" class="table table-striped table-bordered table-hover table-condensed">



<thead>

		<tr>

			<th scope="col" class="text-center">Date</th>

			<th scope="col" class="text-center">Start time</th>

			<th scope="col" class="text-center">End Time</th>

			<th scope="col" class="text-center">Job No.</th>

			<th scope="col" class="text-center">Client Name</th>

			<th scope="col" class="text-center">RTL Name</th>

			<th scope="col" class="text-center">Print / Sample / Test / Cancel</th>

			<th scope="col" colspan="2" class="text-center">Printing Size (Inches)</th>

			<th scope="col" class="text-center">Print SQ FT</th>

			<th scope="col" class="text-center">No. Of Copies</th>

			<th scope="col" class="text-center">Total Printable SQ. FT.</th>

			<th scope="col" colspan="2" class="text-center hidden">Wastage Size (Inches) x</th>

			<th scope="col" class="text-center hidden">Total Wastage SQ FT</th>

			<th scope="col" class="text-center">Media Type / Name</th>

			<th scope="col" class="text-center">Roll Number</th>

			<th scope="col" class="text-center">(R) - Rigid (F) - Flexi</th>

			<th scope="col" colspan="2" class="text-center">Total Media use for Printing (Inches)	</th>

			<th scope="col" colspan="2" class="text-center">Total Media use for Printing (Feet)</th>

			<th scope="col" class="text-center">Media Total Use SQ FT</th>

			<th scope="col" colspan="3" class="text-center">Total Media Wastage</th>

			<th scope="col" class="text-center">Media Total Wastage SQ FT</th>

			<th scope="col" class="text-center">Density</th>

			<th scope="col" class="text-center">Speed</th>

			<th scope="col" class="text-center">Print Mode</th>

			<th scope="col" class="text-center">Directional</th>

			<th scope="col" class="text-center">Print Quality</th>

			<th scope="col" class="text-center">Carriage Height (MM)</th>

			<th scope="col" class="text-center">Profile</th>

			<th scope="col" class="text-center">Passes</th>

			<th scope="col" class="text-center">Curing Power</th>

			<th scope="col" class="text-center">Shutter Mode</th>

			<th scope="col" class="text-center">RIP Station</th>

			<th scope="col" class="text-center">Ink Used as per RTL</th>

			<th scope="col" class="text-center">Total Ink Used in ML</th>

			<th scope="col" class="text-center">Print Time (Min)</th>

			<th scope="col" class="text-center">Print Total Time</th>

			<th scope="col" class="text-center">Machine Name</th>

			<th scope="col" class="text-center">Printer Name</th>

		</tr>

		<tr>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">Width</th>

			<th scope="col" class="text-center">Length</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center hidden">Width1 x</th>

			<th scope="col" class="text-center hidden">Length1 x</th>

			<th scope="col" class="text-center hidden">&nbsp; x</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">Width</th>

			<th scope="col" class="text-center">Length</th>

			<th scope="col" class="text-center">Width</th>

			<th scope="col" class="text-center">Length</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">Width</th>

			<th scope="col" class="text-center">Height</th>

			<th scope="col" class="text-center">Bottom</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

			<th scope="col" class="text-center">&nbsp;</th>

		</tr>

	</thead>

	<tbody>

	<?php

		foreach( $results AS $result ):

	?>

		<tr>

			<td class="text-right"><?php echo date('d-m-Y', strtotime($result['job_date'].'00:00:00'));?></td>

			<td class="text-right"><?php echo date('h:i A', strtotime('0000-00-00 '.$result['job_start_time']));?></td>

			<td class="text-right"><?php echo date('h:i A', strtotime('0000-00-00 '.$result['job_end_time']));?></td>

			<td class="text-right"><?php echo $result['job_id'];?></td>

			<td class="text-center"><?php echo $result['client_name'];?></td>

			<td class="text-center"><?php echo $result['rtl_id'];?></td>

			<td class="text-center"><?php echo $result['prnt_type_name'];?></td>

			<td class="text-right"><?php echo $result['prnt_size_w_in'];?></td>

			<td class="text-right"><?php echo $result['prnt_size_l_in'];?></td>

			<td class="text-right"><?php echo $result['prnt_size_sqft'];?></td>

			<td class="text-right"><?php echo $result['no_copies'];?></td>

			<td class="text-right"><?php echo $result['total_print_sqft'];?></td>

			<td class="text-right hidden"><?php echo $result['waste_size_w_in'];?> x</td>

			<td class="text-right hidden"><?php echo $result['waste_size_l_in'];?> x</td>

			<td class="text-right hidden"><?php echo $result['total_waste_sqft'];?> x</td>

			<td class="text-center"><?php echo $result['media_type_name'];?></td>

			<td class="text-right"><?php echo $result['roll_number'];?></td>

			<td class="text-center"><?php echo $result['platform_type_name'];?></td>

			<td class="text-right"><?php echo $result['media_used_w_in'];?></td>

			<td class="text-right"><?php echo $result['media_used_l_in'];?></td>

			<td class="text-right"><?php echo $result['total_media_w_ft'];?></td>

			<td class="text-right"><?php echo $result['total_media_l_ft'];?></td>

			<td class="text-right"><?php echo $result['total_media_used_sqft'];?></td>

			<td class="text-right"><?php echo $result['total_media_waste_w'];?></td>

			<td class="text-right"><?php echo $result['total_media_waste_h'];?></td>

			<td class="text-right"><?php echo $result['total_media_waste_b'];?></td>

			<td class="text-right"><?php echo $result['total_media_wastage_sqft'];?></td>

			<td class="text-center"><?php echo $result['density_name'];?></td>

			<td class="text-right"><?php echo $result['prnt_speed_status'];?></td>

			<td class="text-center"><?php echo $result['prnt_mode_name'];?></td>

			<td class="text-center"><?php echo $result['direction'];?></td>

			<td class="text-center"><?php echo $result['prnt_qlty_name'];?></td>

			<td class="text-right"><?php echo $result['carriage_h_mm'];?></td>

			<td class="text-center"><?php echo $result['profile_label'];?></td>

			<td class="text-right"><?php echo $result['pass_label'];?></td>

			<td class="text-center"><?php echo $result['curing_label'];?></td>

			<td class="text-center"><?php echo $result['shutter_mode_name'];?></td>

			<td class="text-center"><?php echo $result['station_label'];?></td>

			<td class="text-right"><?php echo $result['ink_used_rtl'];?></td>

			<td class="text-right"><?php echo $result['total_ink_used'];?></td>

			<td class="text-right"><?php echo $result['prnt_time'];?></td>

			<td class="text-right"><?php echo $result['total_prnt_time'];?></td>

			<td class="text-center"><?php echo $result['machine_label'];?></td>

			<td class="text-center"><?php echo $result['fullname'];?> (<?php echo $result['loginid'];?>)</td>

		</tr>

	<?php

		endforeach;

	?>

	</tbody>

</table>



<?php

	else:



	echo 'No record Found!';

?>



<?php

		endif; // results

	}

?>



<?php

	if( $action == 'download'):

		$results = $database->count(

			$file[0]['tbl_child'],



			[

				"[>]".$file[0]['tbl_parent'] => ["job_id" => "job_id"]

			],



			'*',

			$subquery

		);



		if( $results ) {



			/** Include PHPExcel */

			require_once dirname(__FILE__) . '/PHPExcel-1.8/PHPExcel.php';

			require_once dirname(__FILE__) . '/PHPExcel-1.8/PHPExcel/IOFactory.php';

			include('export-download.php');

		}



		echo 'No record found!';



	endif;

?>