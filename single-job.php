<?php
$pageTitle = "Single Job";
require_once('config.php');
include_once('header.php');

check_login();
include_once('menu.php');

$jobsub_id = ( isset($_REQUEST['id']) ) ? $_REQUEST['id'] : '';
$printdata = $database->select(
        'jobs_meta', [
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
    'jobs_meta.jmsid' => $jobsub_id,
    'ORDER' => 'jobs_meta.job_date DESC'
        ]
);

#var_dump( $database->log() );

$job_id = ( isset($printdata[0]['job_id']) ) ? $printdata[0]['job_id'] : '';
$client_name = ( isset($printdata[0]['client_name']) ) ? $printdata[0]['client_name'] : '';
$client_id = ( isset($printdata[0]['client_id']) ) ? $printdata[0]['client_id'] : '';
$rtl_id = ( isset($printdata[0]['rtl_id']) ) ? $printdata[0]['rtl_id'] : '';
$profile = ( isset($printdata[0]['profile_label']) ) ? $printdata[0]['profile_label'] : '';
$machine = ( isset($printdata[0]['machine_label']) ) ? $printdata[0]['machine_label'] : '';
$prnt_type = ( isset($printdata[0]['prnt_type_name']) ) ? $printdata[0]['prnt_type_name'] : '';
$prnt_size_w_mm = ( isset($printdata[0]['prnt_size_w_mm']) ) ? $printdata[0]['prnt_size_w_mm'] : '';
$prnt_size_l_mm = ( isset($printdata[0]['prnt_size_l_mm']) ) ? $printdata[0]['prnt_size_l_mm'] : '';
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
$prnt_speed = ( isset($printdata[0]['prnt_speed_label']) ) ? $printdata[0]['prnt_speed_label'] : '';
$prnt_mode_id = ( isset($printdata[0]['prnt_mode_id']) ) ? $printdata[0]['prnt_mode_id'] : '';
$direction = ( isset($printdata[0]['direction']) ) ? $printdata[0]['direction'] : '';
$prnt_qlty_id = ( isset($printdata[0]['prnt_qlty_id']) ) ? $printdata[0]['prnt_qlty_id'] : '';
$carriage_h_mm = ( isset($printdata[0]['carriage_h_mm']) ) ? $printdata[0]['carriage_h_mm'] : '';
$rip_station = ( isset($printdata[0]['station_label']) ) ? $printdata[0]['station_label'] : '';
$passes = ( isset($printdata[0]['pass_label']) ) ? $printdata[0]['pass_label'] : '';
$curing_power = ( isset($printdata[0]['curing_label']) ) ? $printdata[0]['curing_label'] : '';
$shutter_mode_id = ( isset($printdata[0]['shutter_mode_id']) ) ? $printdata[0]['shutter_mode_id'] : '';
$ink_used_rtl = ( isset($printdata[0]['ink_used_rtl']) ) ? $printdata[0]['ink_used_rtl'] : '';
$total_ink_used = ( isset($printdata[0]['total_ink_used']) ) ? $printdata[0]['total_ink_used'] : '';
$prnt_time = ( isset($printdata[0]['prnt_time']) ) ? $printdata[0]['prnt_time'] : '';
$total_prnt_time = ( isset($printdata[0]['total_prnt_time']) ) ? $printdata[0]['total_prnt_time'] : '';

$job_date = ( isset($printdata[0]['job_date']) ) ? date('Y-m-d', strtotime($printdata[0]['job_date'] . ' 00:00:00')) : '';
$job_start_time = ( isset($printdata[0]['job_start_time']) ) ? date("H:i:s", strtotime($printdata[0]['job_start_time'])) : '';
$job_end_time = ( isset($printdata[0]['job_end_time']) ) ? date("H:i:s", strtotime($printdata[0]['job_end_time'])) : '';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1>

            <div class="btn-group pull-right" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-danger"><a href="?action=delete_job&id=<?php echo $jobsub_id; ?>&job_id=<?php echo $job_id; ?>" style="color: #fff; text-decoration: none" id="deleteJob"><span class="glyphicon btn-glyphicon glyphicon-trash" style="color: #fff; margin-right: 5px;"></span> DELETE</a></button>
                <button type="button" class="btn btn-info"><a href="<?php echo SITEURL; ?>/edit-job.php?action=edit&id=<?php echo $jobsub_id; ?>&job_id=<?php echo $job_id; ?>" style="color: #fff; text-decoration: none"><span class="glyphicon btn-glyphicon glyphicon-pencil" style="color: #fff; margin-right: 5px;"></span> EDIT</a></button>
                <button type="button" class="btn btn-primary"><a href="<?php echo SITEURL; ?>/add-job.php?action=clone&id=<?php echo $jobsub_id; ?>&job_id=<?php echo $job_id; ?>" style="color: #fff; text-decoration: none"><span class="glyphicon btn-glyphicon glyphicon-random" style="color: #fff; margin-right: 5px;"></span> CLONE</a></button>
            </div>

        </div>

        <?php
        if (empty($job_id)) {
            ?>
            <div class="col-lg-12">
                <div class="alert alert-danger" role="alert">
                    <div class="bs-callout bs-callout-danger" id="callout-navbar-js">
                        <h4>Job ID Missing</h4>
                        <p>Please <a href="<?php echo SITEURL; ?>/list-jobs.php">click here</a> to select a job id.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once("footer.php");
    exit();
}
?>


<div class="col-lg-12">
    <form class="form-add-job" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="gap">&nbsp;</div>

        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-6">
                    <label for="job_id" class="">Job IDs</label>
                    <input value="<?php echo $job_id; ?>" class="form-control input-lg" readonly>
                </div>

                <div class="col-lg-6">
                    <label for="client_id" class="">Client Name</label>
                    <input value="<?php echo $client_name; ?>" class="form-control input-lg" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-4">
                    <label for="job_date" class="job_date">Date</label>
                    <input value="<?= date("d-m-Y", strtotime($job_date)); ?>" class="form-control input-lg job_date" readonly>
                </div>
                <div class="col-lg-8">
                    <label for="profile_label" class="profile_label">Profile</label>
                    <input value="<?php echo $profile; ?>" class="form-control input-lg" readonly >
                </div>
            </div>
        </div>



        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-6">
                    <label for="rtl_id" class="">RTL Name</label>
                    <input class="form-control input-lg" value="<?= $rtl_id; ?>" readonly>
                </div>

                <div class="col-lg-3">
                    <label for="machine" class="">Machine</label><br />
                    <input class="form-control input-lg" value="<?= $machine; ?>" readonly>
                </div>

                <div class="col-lg-3">
                    <label for="prnt_type_id" class="">Print Type</label><br />
                    <input class="form-control input-lg" value="<?= $prnt_type; ?>" readonly>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="form-group clearfix">

                <div class="col-lg-6">
                    <label for="" class="">Print Size in Inches (width x length)</label>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control input-lg prnt_size_w_in" value="<?= $prnt_size_w_in; ?>" readonly>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control input-lg prnt_size_l_in" value="<?= $prnt_size_l_in; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <label for="" class="">Print Size in Sq. Ft.</label>
                    <div class="form-group">
                        <input class="form-control input-lg prnt_size_sqft" value="<?= $prnt_size_sqft; ?>" readonly>
                    </div>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-6">
                    <label for="no_copies" class="">No. of Copied</label>
                    <div class="form-group">
                        <input class="form-control input-lg no_copies" value="<?= $no_copies; ?>" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="total_print_sqft" class="">Total  Printable SQ. FT.</label>
                    <div class="form-group">
                        <input class="form-control input-lg total_print_sqft" value="<?= $total_print_sqft; ?>" readonly>
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
                                <input class="form-control input-lg waste_size_w_in" value="<?= $waste_size_w_in; ?>" readonly>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control input-lg waste_size_l_in" value="<?= $waste_size_l_in; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <label for="" class="">Total Waste in Sq Ft</label>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control input-lg total_waste_sqft" value="<?= $total_waste_sqft; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>



        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-6">
                    <label for="media_group_id" class="">Media Brand</label>
                    <input class="form-control input-lg" value="<?= $printdata[0]['media_group_label']; ?>" readonly>
                </div>
                <div class="col-lg-6">
                    <label for="media_type_id" class="">Media Type / Name</label>
                    <input class="form-control input-lg" value="<?= $printdata[0]['media_type_name']; ?>" readonly>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-6">
                    <label for="roll_number" class="">Roll Number</label>
                    <input class="form-control input-lg roll_number" value="<?= $roll_number; ?>" readonly>
                </div>
                <div class="col-lg-6 clearfix">
                    <label for="platform_id" class="">Platform</label><br />
                    <input class="form-control input-lg" value="<?= $printdata[0]['platform_id']; ?>" readonly>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-6">
                    <label for="media_used_w_mm" class="media_used_w_in">Total media used for printing in Inches (width)</label>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control input-lg media_used_w_in" value="<?= $media_used_w_in; ?>" readonly>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control input-lg media_used_l_in" value="<?= $media_used_l_in; ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="total_media_in_ft" class="total_media_in_ft">Total media use for printing in feet</label>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control input-lg total_media_w_ft" value="<?= $total_media_w_ft; ?>" readonly>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control input-lg total_media_l_ft" value="<?= $total_media_l_ft; ?>" readonly>
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
                    <input class="form-control input-lg total_media_used_sqft" value="<?= $total_media_used_sqft; ?>" readonly>
                </div>
                <div class="col-lg-5">
                    <label for="total_media_waste_w" class="total_media_waste_w">Total media wastage in inches (Width x Height x Bottom)</label>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4">
                                <input class="form-control input-lg total_media_waste_w" value="<?= $total_media_waste_w; ?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <input class="form-control input-lg total_media_waste_h" value="<?= $total_media_waste_h; ?>" readonly>
                            </div>
                            <div class="col-lg-4">
                                <input class="form-control input-lg total_media_waste_b" value="<?= $total_media_waste_b; ?>" readonly>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <label for="total_media_wastage_sqft" class="density_id">Total Media Wastage in Sq Ft</label>
                    <input class="form-control input-lg total_media_wastage_sqft" value="<?= $total_media_wastage_sqft; ?>" readonly>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-4">
                    <label for="density_id" class="density_id">Density</label>
                    <input class="form-control input-lg" value="<?= $printdata[0]['density_id']; ?>" readonly>
                </div>

                <div class="col-lg-4">
                    <label for="prnt_speed" class="prnt_speed">Printing Speed</label>
                    <input class="form-control input-lg prnt_speed" value="<?= $prnt_speed; ?>" readonly>
                </div>
                <div class="col-lg-4">
                    <label for="prnt_mode_id" class="prnt_mode_id">Print Mode</label>
                    <input class="form-control input-lg" value="<?= $printdata[0]['prnt_mode_name']; ?>" readonly>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-4">
                    <label for="direction" class="direction">Direction</label>
                    <input class="form-control input-lg" value="<?= $printdata[0]['direction']; ?>" readonly>
                </div>
                <div class="col-lg-4">
                    <label for="prnt_qlty_id" class="prnt_qlty_id">Print Quality</label>
                    <input class="form-control input-lg" value="<?= $printdata[0]['prnt_qlty_id']; ?>" readonly>
                </div>
                <div class="col-lg-4">
                    <label for="carriage_h_mm" class="	carriage_h_mm">Carriage Heigt (mm)</label>
                    <input step="0.10" class="form-control input-lg carriage_h_mm" placeholder="0.00" value="<?= $carriage_h_mm; ?>" readonly>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-4">
                    <label for="rip_station" class="rip_station">RIP Station</label>
                    <input step="0.10" class="form-control input-lg rip_station" placeholder="0.00" value="<?= $rip_station; ?>" readonly>
                </div>
                <div class="col-lg-4">
                    <label for="passes" class="passes">Passes</label>
                    <input class="form-control input-lg passes" value="<?= $passes; ?>" readonly>
                </div>
                <div class="col-lg-4">
                    <label for="curing_power" class="curing_power">Curing Power</label>
                    <input class="form-control input-lg curing_power" value="<?= $curing_power; ?>" readonly>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-4">
                    <label for="shutter_mode_id" class="shutter_mode_id">Shutter Mode</label>
                    <input class="form-control input-lg" value="<?= $printdata[0]['shutter_mode_name']; ?>" readonly>
                </div>
                <div class="col-lg-4">
                    <label for="ink_used_rtl" class="ink_used_rtl">Ink used as per RTL</label>
                    <input step="0.10" class="form-control input-lg ink_used_rtl" value="<?= $ink_used_rtl; ?>" readonly>
                </div>
                <div class="col-lg-4">
                    <label for="total_ink_used" class="total_ink_used">Total Ink used in ML</label>
                    <input class="form-control input-lg total_ink_used" value="<?= $total_ink_used; ?>" readonly>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="form-group clearfix">
                <div class="col-lg-6">
                    <label for="prnt_time" class="prnt_time">Print Time (in minutes)</label>
                    <input class="form-control input-lg prnt_time" value="<?= $prnt_time; ?>" readonly>
                </div>
                <div class="col-lg-6">
                    <label for="total_prnt_time" class="total_prnt_time">Print Time (in minutes)</label>
                    <input class="form-control input-lg total_prnt_time" value="<?= $total_prnt_time; ?>" readonly>
                </div>
            </div>
        </div>


    </form>
</div>
</div>
</div><!-- /.container -->


<?php
include_once("footer.php");
?>
