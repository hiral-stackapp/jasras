<?php
$pageTitle = "Add Job";
require_once('config.php');
include_once('header.php');

check_login();
include_once('menu.php');

$job_id = ( isset($_REQUEST['job_id']) ) ? $_REQUEST['job_id'] : '';
$action = ( isset($_REQUEST['action']) ) ? $_REQUEST['action'] : '';




#var_dump( $_REQUEST );

if (!empty($action) && $action == 'clone') {

    $jobsub_id = ( isset($_REQUEST['id']) ) ? $_REQUEST['id'] : '';
    $printdata = $database->select(
            'jobs_meta', [
        /* "[>]rtlname" => [ "rtl_id" => "rtl_id" ], */
        "[>]clients" => [ "client_id" => "client_id"],
        "[>]density" => [ "density_id" => "density_id"],
        "[>]media_group" => [ "media_group_id" => "media_group_id"],
        "[>]media_type" => [ "media_type_id" => "media_type_id"],
        "[>]platform" => [ "platform_id" => "platform_id"],
        "[>]print_mode" => [ "prnt_mode_id" => "prnt_mode_id"],
        "[>]print_quality" => [ "prnt_qlty_id" => "prnt_qlty_id"],
        "[>]print_type" => [ "prnt_type_id" => "prnt_type_id"],
        "[>]shutter_mode" => [ "shutter_mode_id" => "shutter_mode_id"],
        "[>]print_speed" => [ "prnt_speed_id" => "prnt_speed_id"],
        "[>]carraige" => [ "carriage_id" => "carriage_id"],
        "[>]rip_station" => [ "station_id" => "station_id"],
        "[>]passes" => [ "pass_id" => "pass_id"],
        "[>]curing" => [ "curing_id" => "curing_id"],
        "[>]profile_env" => [ "profile_id" => "profile_id"],
        "[>]machine" => [ "machine_id" => "machine_id"],
        "[>]user" => [ "user_id" => "uid"]
            ], '*', [
        'jobs_meta.jmsid' => $jobsub_id
            ]
    );


    #var_dump( $printdata );

    $job_id = ( isset($printdata[0]['job_id']) ) ? $printdata[0]['job_id'] : '';
    $client_name = ( isset($printdata[0]['client_name']) ) ? $printdata[0]['client_name'] : '';
    $client_id = ( isset($printdata[0]['client_id']) ) ? $printdata[0]['client_id'] : '';
    $rtl_id = ( isset($printdata[0]['rtl_id']) ) ? $printdata[0]['rtl_id'] : '';
    $profile_id = ( isset($printdata[0]['profile_id']) ) ? $printdata[0]['profile_id'] : '';
    $machine_id = ( isset($printdata[0]['machine_id']) ) ? $printdata[0]['machine_id'] : '';
    $color_id = ( isset($printdata[0]['color_id']) ) ? $printdata[0]['color_id'] : '';
    $media_group_id = ( isset($printdata[0]['media_group_id']) ) ? $printdata[0]['media_group_id'] : '';
    $prnt_speed_id = ( isset($printdata[0]['prnt_speed_id']) ) ? $printdata[0]['prnt_speed_id'] : '';
    $carriage_id = ( isset($printdata[0]['carriage_id']) ) ? $printdata[0]['carriage_id'] : '';
    $station_id = ( isset($printdata[0]['station_id']) ) ? $printdata[0]['station_id'] : '';
    $pass_id = ( isset($printdata[0]['pass_id']) ) ? $printdata[0]['pass_id'] : '';
    $curing_id = ( isset($printdata[0]['curing_id']) ) ? $printdata[0]['curing_id'] : '';
    $prnt_type_id = ( isset($printdata[0]['prnt_type_id']) ) ? $printdata[0]['prnt_type_id'] : '';
    $prnt_size_w_in = ( isset($printdata[0]['prnt_size_w_in']) ) ? $printdata[0]['prnt_size_w_in'] : '';
    $prnt_size_l_in = ( isset($printdata[0]['prnt_size_l_in']) ) ? $printdata[0]['prnt_size_l_in'] : '';
    $prnt_size_sqft = ( isset($printdata[0]['prnt_size_sqft']) ) ? $printdata[0]['prnt_size_sqft'] : '';
    $no_copies = ( isset($printdata[0]['no_copies']) ) ? $printdata[0]['no_copies'] : '';
    $total_print_sqft = ( isset($printdata[0]['total_print_sqft']) ) ? $printdata[0]['total_print_sqft'] : '';
    $waste_size_w_in = ( isset($printdata[0]['waste_size_w_in']) ) ? $printdata[0]['waste_size_w_in'] : '';
    $waste_size_l_in = ( isset($printdata[0]['waste_size_l_in']) ) ? $printdata[0]['waste_size_l_in'] : '';
    $total_waste_sqft = ( isset($printdata[0]['total_waste_sqft']) ) ? $printdata[0]['total_waste_sqft'] : '';
    $media_group_id = ( isset($printdata[0]['media_group_id']) ) ? $printdata[0]['media_group_id'] : '';
    $media_type_id = ( isset($printdata[0]['media_type_id']) ) ? $printdata[0]['media_type_id'] : '';
    $roll_number = ( isset($printdata[0]['roll_number']) ) ? $printdata[0]['roll_number'] : '';
    $platform_id = ( isset($printdata[0]['platform_id']) ) ? $printdata[0]['platform_id'] : '';
    $media_used_w_in = ( isset($printdata[0]['media_used_w_in']) ) ? $printdata[0]['media_used_w_in'] : '';
    $media_used_l_in = ( isset($printdata[0]['media_used_l_in']) ) ? $printdata[0]['media_used_l_in'] : '';
    $total_media_w_ft = ( isset($printdata[0]['total_media_w_ft']) ) ? $printdata[0]['total_media_w_ft'] : '';
    $total_media_l_ft = ( isset($printdata[0]['total_media_l_ft']) ) ? $printdata[0]['total_media_l_ft'] : '';
    $total_media_used_sqft = ( isset($printdata[0]['total_media_used_sqft']) ) ? $printdata[0]['total_media_used_sqft'] : '';
    $total_media_waste_w = ( isset($printdata[0]['total_media_waste_w']) ) ? $printdata[0]['total_media_waste_w'] : '';
    $total_media_waste_h = ( isset($printdata[0]['total_media_waste_h']) ) ? $printdata[0]['total_media_waste_h'] : '';
    $total_media_waste_b = ( isset($printdata[0]['total_media_waste_b']) ) ? $printdata[0]['total_media_waste_b'] : '';
    $total_media_wastage_sqft = ( isset($printdata[0]['total_media_wastage_sqft']) ) ? $printdata[0]['total_media_wastage_sqft'] : '';
    $density_id = ( isset($printdata[0]['density_id']) ) ? $printdata[0]['density_id'] : '';
    $prnt_speed = ( isset($printdata[0]['prnt_speed']) ) ? $printdata[0]['prnt_speed'] : '';
    $prnt_mode_id = ( isset($printdata[0]['prnt_mode_id']) ) ? $printdata[0]['prnt_mode_id'] : '';
    $direction = ( isset($printdata[0]['direction']) ) ? $printdata[0]['direction'] : '';
    $prnt_qlty_id = ( isset($printdata[0]['prnt_qlty_id']) ) ? $printdata[0]['prnt_qlty_id'] : '';
    $carriage_h_mm = ( isset($printdata[0]['carriage_h_mm']) ) ? $printdata[0]['carriage_h_mm'] : '';
    $head_elevation = ( isset($printdata[0]['head_elevation']) ) ? $printdata[0]['head_elevation'] : '';
    $passes = ( isset($printdata[0]['passes']) ) ? $printdata[0]['passes'] : '';
    $curing_power = ( isset($printdata[0]['curing_power']) ) ? $printdata[0]['curing_power'] : '';
    $shutter_mode_id = ( isset($printdata[0]['shutter_mode_id']) ) ? $printdata[0]['shutter_mode_id'] : '';
    $ink_used_rtl = ( isset($printdata[0]['ink_used_rtl']) ) ? $printdata[0]['ink_used_rtl'] : '';
    $total_ink_used = ( isset($printdata[0]['total_ink_used']) ) ? $printdata[0]['total_ink_used'] : '';
    $prnt_time = ( isset($printdata[0]['prnt_time']) ) ? $printdata[0]['prnt_time'] : '';
    $total_prnt_time = ( isset($printdata[0]['total_prnt_time']) ) ? $printdata[0]['total_prnt_time'] : '';
} else {


    $client_name = ( isset($_POST['client_name']) ) ? $_POST['client_name'] : '';
    $job_date = ( isset($_POST['job_date']) ) ? date('Y-m-d', strtotime(str_replace('/', '-', $_POST['job_date'] . ' 00:00:00'))) : date('d/m/Y');
    $client_id = ( isset($_POST['client_id']) ) ? $_POST['client_id'] : '';
    $rtl_id = ( isset($_POST['rtl_id']) ) ? $_POST['rtl_id'] : '';
    $profile_id = ( isset($_POST['profile_id']) ) ? $_POST['profile_id'] : '';
    $machine_id = ( isset($_POST['machine_id']) ) ? $_POST['machine_id'] : '';
    $color_id = ( isset($_POST['color_id']) ) ? $_POST['color_id'] : '';
    $media_group_id = ( isset($_POST['media_group_id']) ) ? $_POST['media_group_id'] : '';
    $prnt_speed_id = ( isset($_POST['prnt_speed_id']) ) ? $_POST['prnt_speed_id'] : '';
    $carriage_id = ( isset($_POST['carriage_id']) ) ? $_POST['carriage_id'] : '';
    $station_id = ( isset($_POST['station_id']) ) ? $_POST['station_id'] : '';
    $pass_id = ( isset($_POST['pass_id']) ) ? $_POST['pass_id'] : '';
    $curing_id = ( isset($_POST['curing_id']) ) ? $_POST['curing_id'] : '';
    $prnt_type_id = ( isset($_POST['prnt_type_id']) ) ? $_POST['prnt_type_id'] : '';
    $prnt_size_w_in = ( isset($_POST['prnt_size_w_in']) ) ? $_POST['prnt_size_w_in'] : '';
    $prnt_size_l_in = ( isset($_POST['prnt_size_l_in']) ) ? $_POST['prnt_size_l_in'] : '';
    $prnt_size_sqft = ( isset($_POST['prnt_size_sqft']) ) ? $_POST['prnt_size_sqft'] : '';
    $no_copies = ( isset($_POST['no_copies']) ) ? $_POST['no_copies'] : '';
    $total_print_sqft = ( isset($_POST['total_print_sqft']) ) ? $_POST['total_print_sqft'] : '';
    $waste_size_w_in = ( isset($_POST['waste_size_w_in']) ) ? $_POST['waste_size_w_in'] : '';
    $waste_size_l_in = ( isset($_POST['waste_size_l_in']) ) ? $_POST['waste_size_l_in'] : '';
    $total_waste_sqft = ( isset($_POST['total_waste_sqft']) ) ? $_POST['total_waste_sqft'] : '';
    $media_group_id = ( isset($_POST['media_group_id']) ) ? $_POST['media_group_id'] : '';
    $media_type_id = ( isset($_POST['media_type_id']) ) ? $_POST['media_type_id'] : '';
    $roll_number = ( isset($_POST['roll_number']) ) ? $_POST['roll_number'] : '';
    $platform_id = ( isset($_POST['platform_id']) ) ? $_POST['platform_id'] : '';
    $media_used_w_in = ( isset($_POST['media_used_w_in']) ) ? $_POST['media_used_w_in'] : '';
    $media_used_l_in = ( isset($_POST['media_used_l_in']) ) ? $_POST['media_used_l_in'] : '';
    $total_media_w_ft = ( isset($_POST['total_media_w_ft']) ) ? $_POST['total_media_w_ft'] : '';
    $total_media_l_ft = ( isset($_POST['total_media_l_ft']) ) ? $_POST['total_media_l_ft'] : '';
    $total_media_used_sqft = ( isset($_POST['total_media_used_sqft']) ) ? $_POST['total_media_used_sqft'] : '';
    $total_media_waste_w = ( isset($_POST['total_media_waste_w']) ) ? $_POST['total_media_waste_w'] : '';
    $total_media_waste_h = ( isset($_POST['total_media_waste_h']) ) ? $_POST['total_media_waste_h'] : '';
    $total_media_waste_b = ( isset($_POST['total_media_waste_b']) ) ? $_POST['total_media_waste_b'] : '';
    $total_media_wastage_sqft = ( isset($_POST['total_media_wastage_sqft']) ) ? $_POST['total_media_wastage_sqft'] : '';
    $density_id = ( isset($_POST['density_id']) ) ? $_POST['density_id'] : '';
    $prnt_speed = ( isset($_POST['prnt_speed']) ) ? $_POST['prnt_speed'] : '';
    $prnt_mode_id = ( isset($_POST['prnt_mode_id']) ) ? $_POST['prnt_mode_id'] : '';
    $direction = ( isset($_POST['direction']) ) ? $_POST['direction'] : '';
    $prnt_qlty_id = ( isset($_POST['prnt_qlty_id']) ) ? $_POST['prnt_qlty_id'] : '';
    $carriage_h_mm = ( isset($_POST['carriage_h_mm']) ) ? $_POST['carriage_h_mm'] : '';
    $head_elevation = ( isset($_POST['head_elevation']) ) ? $_POST['head_elevation'] : '';
    $passes = ( isset($_POST['passes']) ) ? $_POST['passes'] : '';
    $curing_power = ( isset($_POST['curing_power']) ) ? $_POST['curing_power'] : '';
    $shutter_mode_id = ( isset($_POST['shutter_mode_id']) ) ? $_POST['shutter_mode_id'] : '';
    $ink_used_rtl = ( isset($_POST['ink_used_rtl']) ) ? $_POST['ink_used_rtl'] : '';
    $total_ink_used = ( isset($_POST['total_ink_used']) ) ? $_POST['total_ink_used'] : '';
    $prnt_time = ( isset($_POST['prnt_time']) ) ? $_POST['prnt_time'] : '';
    $total_prnt_time = ( isset($_POST['total_prnt_time']) ) ? $_POST['total_prnt_time'] : '';
}


$printer_id = $_SESSION['uid'];

if (isset($_POST['submit'])) {

    $new_job_id = $database->insert("jobs_meta", [
        'job_id' => $job_id,
        'user_id' => $_SESSION['uid'],
        'client_id' => $client_id,
        'job_date' => $job_date . ' 00:00:00',
        'profile_id' => $profile_id,
        'rtl_id' => $rtl_id,
        'machine_id' => $machine_id,
        'prnt_type_id' => $prnt_type_id,
        'color_id' => $color_id,
        'prnt_size_w_in' => $prnt_size_w_in,
        'prnt_size_l_in' => $prnt_size_l_in,
        'prnt_size_sqft' => $prnt_size_sqft,
        'no_copies' => $no_copies,
        'total_print_sqft' => $total_print_sqft,
        'waste_size_w_in' => $waste_size_w_in,
        'waste_size_l_in' => $waste_size_l_in,
        'total_waste_sqft' => $total_waste_sqft,
        'media_type_id' => $media_type_id,
        'media_group_id' => $media_group_id,
        'roll_number' => $roll_number,
        'platform_id' => $platform_id,
        'media_used_w_in' => $media_used_w_in,
        'media_used_l_in' => $media_used_l_in,
        'total_media_w_ft' => $total_media_w_ft,
        'total_media_l_ft' => $total_media_l_ft,
        'total_media_used_sqft' => $total_media_used_sqft,
        'total_media_waste_w' => $total_media_waste_w,
        'total_media_waste_h' => $total_media_waste_h,
        'total_media_waste_b' => $total_media_waste_b,
        'total_media_wastage_sqft' => $total_media_wastage_sqft,
        'density_id' => $density_id,
        'prnt_speed_id' => $prnt_speed_id,
        'prnt_mode_id' => $prnt_mode_id,
        'direction' => $direction,
        'prnt_qlty_id' => $prnt_qlty_id,
        'carriage_id' => $carriage_id,
        'station_id' => $station_id,
        'pass_id' => $pass_id,
        'curing_id' => $curing_id,
        'shutter_mode_id' => $shutter_mode_id,
        'ink_used_rtl' => $ink_used_rtl,
        'total_ink_used' => $total_ink_used,
        'prnt_time' => $prnt_time,
        'total_prnt_time' => $total_prnt_time,
        'printer_id' => $printer_id,
        'job_start_time' => date("H:i:s"),
        'job_end_time' => date("H:i:s")
    ]);

    #echo 'LOG';
    #var_dump( $database->log() );
}
$idx = "1";
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>

<?php
if (empty($job_id)) {

    $results = $database->select('jobs', [
        "[>]clients" => ["client_id" => "client_id"]
            ], '*', [
        "ORDER" => ["clients.client_name ASC", "jobs.job_id ASC"]
    ]);
    #var_dump( $results );

    foreach ($results AS $result) :
        $alljobs[$result['client_name']][] = array(
            'job_id' => $result['job_id'],
            'client_name' => $result['client_name'],
            'client_id' => $result['client_id'],
            'created_on' => $result['created_on']
        );

    endforeach;
    ?>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

            <?php
            $id = '0';
            foreach ($alljobs AS $clientname => $clientdata):
                $id++;
                ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading_<?= $id; ?>">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $id; ?>" aria-expanded="false" aria-controls="collapse_<?= $id; ?>">
        <?php echo $clientname; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_<?= $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?= $id; ?>">
                                    <div class="panel-body">
                                        <ul class="jobblocks row">
        <?php
        foreach ($clientdata AS $v) :
            ?>
                                                <li class="col-lg-1">
                                                    <a href="<?php echo SITEURL; ?>/add-job.php?job_id=<?php echo $v['job_id']; ?>"><?php echo $v['job_id']; ?></a>
                                                </li>
            <?php
        endforeach;
        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                            <?php
                                        endforeach;
                                        ?>


                    </div>
                </div>
            </div>





        </div>
    </div>
    <?php 

    } else {
    ?>


    <div class="col-lg-12">

    <?php
    if (isset($new_job_id)) {
        // successfully added to db
        ?>

            <div class="row" id="successMsg">
                <div class="col-lg-12">
                    <div class="alert alert-success clearfix" role="alert">
                        <div class="col-lg-1">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        </div>
                        <div class="col-lg-11">
                            <ul>
                                <li>Successfully Added!</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>




            <?php
            } else {

            ?>

            <form class="form-add-job" name="form-add-job" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="gap">&nbsp;</div>

        <?php
        $result = $database->select('jobs', [
            "[>]clients" => ["client_id" => "client_id"]
                ], '*', [
            "job_id" => "$job_id",
            "LIMIT" => 1]
        );
        #var_dump( $result );
        ?>

                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="job_id" class="">Job ID</label>
                            <input type="text" id="job_id" name="job_id" value="<?php echo $result[0]['job_id']; ?>" class="form-control"  readonly>
                        </div>

                        <div class="col-lg-6">
                            <label for="client_id" class="">Client Name</label>
                            <input type="text" id="client_name" name="client_name" value="<?php echo $result[0]['client_name']; ?>" class="form-control" readonly>
                            <input type="hidden" id="client_id" name="client_id" value="<?php echo $result[0]['client_id']; ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-2">
                            <label for="job_date" class="job_date">Date</label>
                            <input type="text" id="job_date" name="job_date" class="form-control job_date" placeholder="0" tabindex="<?= $idx++; ?>" value="<?= (isset($_POST['job_date'])) ? $_POST['job_date'] : date('d/m/Y'); ?>" required data-position='bottom left'>
                        </div>

                        <div class="col-lg-5">
                            <label for="profile_id" class="profile_id">Profile</label>

                            <select data-placeholder="Select" class="form-control chosen-select" name="profile_id" id="profile_id" tabindex="<?= $idx++; ?>" autofocus required>
                                <option value=""></option>
        <?php
        $results = $database->select("profile_env", "*", ['ORDER' => 'profile_label ASC']);
        foreach ($results AS $result):
            $active = ( $result['profile_id'] == $profile_id ) ? ' SELECTED' : '';
            echo "<option value='" . $result['profile_id'] . "' " . $active . ">" . strtoupper($result['profile_label']) . "</option>";
        endforeach;
        ?>
                            </select>

                        </div>

                        <div class="col-lg-5">
                            <label for="rtl_id" class="">RTL Name</label>
                            <input type="text" id="rtl_id" name="rtl_id" class="form-control rtl_id" placeholder="RTL Name" tabindex="<?= $idx++; ?>" value="<?= $rtl_id; ?>" required>

                                                                <!-- <select data-placeholder="Select" class="form-control chosen-select" name="rtl_id" id="rtl_id" tabindex="<?= $idx++; ?>" autofocus required>
                                                                        <option value=""></option>
                                <?php
                                $results = $database->select("rtlname", "*", ['ORDER' => 'rtl_name ASC']);
                                foreach ($results AS $result):
                                    $active = ( $result['rtl_id'] == $rtl_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['rtl_id'] . "' title='" . $result['rtl_desc'] . "' " . $active . ">" . $result['rtl_name'] . "</option>";
                                endforeach;
                                ?>
                                                                </select> -->
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-4">
                            <label for="machine_id" class="">Machine</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="machine_id" id="machine_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
        <?php
        $results = $database->select("machine", "*", ['ORDER' => 'machine_label ASC']);
        foreach ($results AS $result):
            $active = ( $result['machine_id'] == $machine_id ) ? ' SELECTED' : '';
            echo "<option value='" . $result['machine_id'] . "' " . $active . ">" . $result['machine_label'] . "</option>";
        endforeach;
        ?>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="prnt_type_id" class="">Print Type</label><br />
                            <select data-placeholder="Select" class="form-control chosen-select" name="prnt_type_id" id="prnt_type_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
                                <?php
                                $results = $database->select("print_type", "*", ['ORDER' => 'prnt_type_name ASC']);
                                foreach ($results AS $result):
                                    $active = ( $result['prnt_type_id'] == $prnt_type_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['prnt_type_id'] . "' " . $active . ">" . $result['prnt_type_name'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="color_id" class="">Color</label><br />
                            <select data-placeholder="Select" class="form-control chosen-select" name="color_id" id="color_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
                                <?php
                                $results = $database->query("SELECT * FROM color ORDER BY CAST(color_count AS DECIMAL(10,3))")->fetchAll();
                                foreach ($results AS $result):
                                    $active = ( $result['color_id'] == $color_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['color_id'] . "' " . $active . ">" . $result['color_count'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group clearfix">

                        <div class="col-lg-6">
                            <label for="" class="">Print Size in Inches</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="number" id="prnt_size_w_in" name="prnt_size_w_in" class="form-control prnt_size_w_in" placeholder="Width" value="<?= $prnt_size_w_in; ?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="number" id="prnt_size_l_in" name="prnt_size_l_in" class="form-control prnt_size_l_in" placeholder="Length" value="<?= $prnt_size_l_in; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="" class="">Print Size in Sq. Ft.</label>
                            <div class="form-group">
                                <input type="text" id="prnt_size_sqft" name="prnt_size_sqft" class="form-control prnt_size_sqft" placeholder="Print Size in Sq Feet" value="<?= $prnt_size_sqft; ?>" readonly>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="no_copies" class="">No. of Copied</label>
                            <div class="form-group">
                                <input type="number" id="no_copies" name="no_copies" class="form-control no_copies" placeholder="0" tabindex="<?= $idx++; ?>" value="<?= $no_copies; ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="total_print_sqft" class="">Total Printable Sq. Ft.</label>
                            <div class="form-group">
                                <input type="text" id="total_print_sqft" name="total_print_sqft" class="form-control total_print_sqft" placeholder="0" value="<?= $total_print_sqft; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row hidden">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="" class="">Wastage Size in Inches (width x length)</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="number" id="waste_size_w_in" name="waste_size_w_in" class="form-control waste_size_w_in" placeholder="Width" tabindex="<?= $idx++; ?>" value="0" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="number" id="waste_size_l_in" name="waste_size_l_in" class="form-control waste_size_l_in" placeholder="Length" tabindex="<?= $idx++; ?>" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="" class="">Total Waste in Sq Ft</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="text" id="total_waste_sqft" name="total_waste_sqft" class="form-control total_waste_sqft" placeholder="0" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group clearfix">

                        <div class="col-lg-6">
                            <label for="media_type_id" class="">Media Type / Name</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="media_type_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
        <?php
        $results = $database->select("media_type", "*", ['media_type_status' => '1', 'ORDER' => 'media_type_name ASC']);
        foreach ($results AS $result):
            $active = ( $result['media_type_id'] == $media_type_id ) ? ' SELECTED' : '';
            echo "<option value='" . $result['media_type_id'] . "' " . $active . ">" . $result['media_type_name'] . "</option>";
        endforeach;
        ?>
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label for="media_group_id" class="">Media Group</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="media_group_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
                                <?php
                                $results = $database->select("media_group", "*", ['ORDER' => 'media_group_label ASC']);
                                foreach ($results AS $result):
                                    $active = ( $result['media_group_id'] == $media_group_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['media_group_id'] . "' " . $active . ">" . $result['media_group_label'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>


                    </div>
                </div>



                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="roll_number" class="">Roll Number</label>
                            <input type="number" id="roll_number" name="roll_number" class="form-control roll_number" placeholder="000" tabindex="<?= $idx++; ?>" value="<?= $roll_number; ?>" required>
                        </div>
                        <div class="col-lg-6 clearfix">
                            <label for="platform_id" class="">Platform</label><br />
                            <select data-placeholder="Select" class="form-control chosen-select" name="platform_id" tabindex="<?= $idx++; ?>"  required>
                                <option value=""></option>
        <?php
        $results = $database->select("platform", "*", ['ORDER' => 'platform_type_name ASC']);
        foreach ($results AS $result):
            $active = ( $result['platform_id'] == $platform_id ) ? ' SELECTED' : '';
            echo "<option value='" . $result['platform_id'] . "' " . $active . ">" . $result['platform_type_name'] . "</option>";
        endforeach;
        ?>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="media_used_w_mm" class="media_used_w_in">Total media used for printing in Inches</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="number" id="media_used_w_in" name="media_used_w_in" class="form-control media_used_w_in" placeholder="Width" tabindex="<?= $idx++; ?>" value="<?= $media_used_w_in; ?>" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" id="media_used_l_in" name="media_used_l_in" class="form-control media_used_l_in" placeholder="Length" value="<?= $media_used_l_in; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="total_media_in_ft" class="total_media_in_ft">Total media use for printing in Feet</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" id="total_media_w_ft" name="total_media_w_ft" class="form-control total_media_w_ft" placeholder="Width" value="<?= $total_media_w_ft; ?>" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" id="total_media_l_ft" name="total_media_l_ft" class="form-control total_media_l_ft" placeholder="Length" value="<?= $total_media_l_ft; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-4">
                            <label for="total_media_used_sqft" class="density_id">Total Media Used in Sq Ft</label>
                            <input type="text" id="total_media_used_sqft" name="total_media_used_sqft" class="form-control total_media_used_sqft" placeholder="0" value="<?= $total_media_used_sqft; ?>" readonly>
                        </div>
                        <div class="col-lg-5">
                            <label for="total_media_waste_w" class="total_media_waste_w">Total media wastage in inches (Width x Height x Bottom)</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" id="total_media_waste_w" name="total_media_waste_w" class="form-control total_media_waste_w" placeholder="0" value="<?= $total_media_waste_w; ?>" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" id="total_media_waste_h" name="total_media_waste_h" class="form-control total_media_waste_h" placeholder="0" value="<?= $total_media_waste_h; ?>" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" id="total_media_waste_b" name="total_media_waste_b" class="form-control total_media_waste_b" placeholder="0" value="<?= $total_media_waste_b; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3">
                            <label for="total_media_wastage_sqft" class="density_id">Total Media Wastage in Sq Ft</label>
                            <input type="text" id="total_media_wastage_sqft" name="total_media_wastage_sqft" class="form-control total_media_wastage_sqft" placeholder="0" value="<?= $total_media_wastage_sqft; ?>" readonly>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-4">
                            <label for="density_id" class="density_id">Density</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="density_id" tabindex="<?= $idx++; ?>"  required>
                                <option value=""></option>
        <?php
        $results = $database->select("density", "*", ['ORDER' => 'density_name ASC']);
        foreach ($results AS $result):
            $active = ( $result['density_id'] == $density_id ) ? ' SELECTED' : '';
            echo "<option value='" . $result['density_id'] . "' " . $active . ">" . $result['density_name'] . "</option>";
        endforeach;
        ?>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="prnt_speed" class="prnt_speed">Printing Speed</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="prnt_speed_id" id="prnt_speed_id" tabindex="<?= $idx++; ?>"  required>
                                <option value=""></option>
                                <?php
                                $results = $database->query("SELECT * FROM print_speed ORDER BY CAST(prnt_speed_label AS DECIMAL(10,0))")->fetchAll();
                                foreach ($results AS $result):
                                    $active = ( $result['prnt_speed_id'] == $prnt_speed_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['prnt_speed_id'] . "' " . $active . ">" . $result['prnt_speed_label'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="prnt_mode_id" class="prnt_mode_id">Print Mode</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="prnt_mode_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
                                <?php
                                $results = $database->select("print_mode", "*", ['ORDER' => 'prnt_mode_name ASC']);
                                foreach ($results AS $result):
                                    $active = ( $result['prnt_mode_id'] == $prnt_mode_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['prnt_mode_id'] . "' " . $active . ">" . $result['prnt_mode_name'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-4">
                            <label for="direction" class="direction">Direction</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="direction" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
                                <option value="UNI" <?= ($direction == 'UNI') ? 'selected' : ''; ?>>UNI</option>
                                <option value="BI" <?= ($direction == 'BI') ? 'selected' : ''; ?>>BI</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="prnt_qlty_id" class="prnt_qlty_id">Print Quality / DPI</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="prnt_qlty_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
        <?php
        $results = $database->query("SELECT * FROM print_quality ORDER BY CAST(prnt_qlty_name AS DECIMAL(10,3))")->fetchAll();
        foreach ($results AS $result):
            $active = ( $result['prnt_qlty_id'] == $prnt_qlty_id ) ? ' SELECTED' : '';
            echo "<option value='" . $result['prnt_qlty_id'] . "' " . $active . ">" . $result['prnt_qlty_name'] . "</option>";
        endforeach;
        ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="carriage_h_mm" class="carriage_h_mm">Carriage Height (mm)</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="carriage_id" id="carriage_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
                                <?php
                                $results = $database->query("SELECT * FROM carraige ORDER BY CAST(carriage_id AS DECIMAL(10,2))")->fetchAll();

                                foreach ($results AS $result):
                                    $active = ( $result['carriage_id'] == $carriage_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['carriage_id'] . "' " . $active . ">" . $result['carriage_h_mm'] . " mm</option>";
                                endforeach;
                                ?>
                            </select>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-4">
                            <label for="station_id" class="station_id">RIP Station</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="station_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
        <?php
        $results = $database->select("rip_station", "*", ['ORDER' => 'station_label ASC']);
        foreach ($results AS $result):
            $active = ( $result['station_id'] == $station_id ) ? ' SELECTED' : '';
            echo "<option value='" . $result['station_id'] . "' " . $active . ">" . $result['station_label'] . "</option>";
        endforeach;
        ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="passes" class="passes">Passes</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="pass_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
                                <?php
                                $results = $database->query("SELECT * FROM passes ORDER BY CAST(pass_label AS DECIMAL(10,3))")->fetchAll();
                                foreach ($results AS $result):
                                    $active = ( $result['pass_id'] == $pass_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['pass_id'] . "' " . $active . ">" . $result['pass_label'] . " pass</option>";
                                endforeach;
                                ?>
                            </select>


                        </div>
                        <div class="col-lg-4">
                            <label for="curing_power" class="curing_power">Curing Power</label>

                            <select data-placeholder="Select" class="form-control chosen-select" name="curing_id" id="curing_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
                                <?php
                                $results = $database->query("SELECT * FROM curing ORDER BY CAST(curing_label AS DECIMAL(10,3))")->fetchAll();
                                foreach ($results AS $result):
                                    $active = ( $result['curing_id'] == $curing_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['curing_id'] . "' " . $active . ">" . $result['curing_label'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-4">
                            <label for="shutter_mode_id" class="shutter_mode_id">Shutter Mode</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="shutter_mode_id" tabindex="<?= $idx++; ?>" required>
                                <option value=""></option>
                                <?php
                                $results = $database->select("shutter_mode", "*", ['ORDER' => 'shutter_mode_name ASC']);
                                foreach ($results AS $result):
                                    $active = ( $result['shutter_mode_id'] == $shutter_mode_id ) ? ' SELECTED' : '';
                                    echo "<option value='" . $result['shutter_mode_id'] . "' " . $active . ">" . $result['shutter_mode_name'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="ink_used_rtl" class="ink_used_rtl">Ink used as per RTL</label>
                            <input type="number" step="0.10" id="ink_used_rtl" name="ink_used_rtl" class="form-control ink_used_rtl" placeholder="Ink used as per RTL" tabindex="<?= $idx++; ?>" value="<?= $ink_used_rtl; ?>" required>
                        </div>
                        <div class="col-lg-4">
                            <label for="total_ink_used" class="total_ink_used">Total Ink used in ML</label>
                            <input type="text" id="total_ink_used" name="total_ink_used" class="form-control total_ink_used" placeholder="0" value="<?= $total_ink_used; ?>" readonly>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="prnt_time" class="prnt_time">Print Time (in minutes)</label>
                            <input type="number" id="prnt_time" name="prnt_time" class="form-control prnt_time" placeholder="0" tabindex="<?= $idx++; ?>" value="<?= $prnt_time; ?>" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="total_prnt_time" class="total_prnt_time">Total Print Time (in minutes)</label>
                            <input type="text" id="total_prnt_time" name="total_prnt_time" class="form-control total_prnt_time" placeholder="0" value="<?= $total_prnt_time; ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group clearfix">
                            <input type="submit" id="submit" name="submit" value="SAVE" class="btn btn-lg btn-success pull-right" tabindex="<?= $idx++; ?>">
                            <input type="button" id="calculate" name="calculate" value="CALCULATE" class="btn btn-lg btn-info pull-right" tabindex="<?= $idx++; ?>" style="margin: 0 10px">
                        </div>
                    </div>
                </div>

            </form>

    <?php } // insert  ?>



    </div>

<?php } ?>
</div>
</div><!-- /.container -->

<?php
include_once("footer.php");
?>
