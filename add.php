<?php
$pageTitle = "Add New Job";
require_once('config.php');
include_once('header.php');

check_login();
include_once('menu.php');
?>




<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="pagetitle">Add Job</h1>
        </div>
        <div class="col-lg-12">
            <form class="form-add" method="POST" action="">
                <div class="gap">

                </div>

                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="client_id" class="">Client Name</label>
                            <input type="text" id="client_id" name="client_id" class="form-control" placeholder="Client Name" required autofocus>
                        </div>
                        <div class="col-lg-6">
                            <label for="rtl_name" class="">RTL Name</label>
                            <input type="text" id="rtl_name" name="rtl_name" class="form-control rtl_name" placeholder="RTL Name" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="" class="">Print Type</label><br />
                            <label class="radio-inline">
                                <input type="radio" name="prnt_type_id" id="printtype-print" value="1"> Print
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="prnt_type_id" id="printtype-sample" value="2"> Sample
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="prnt_type_id" id="printtype-test" value="3"> Test
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="prnt_type_id" id="printtype-cancel" value="4"> Cancel
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="">Print Size in mm (width x length)</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" id="prnt_size_w_mm" name="prnt_size_w_mm" class="form-control prnt_size_w_mm" placeholder="Print size width (mm)" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" id="prnt_size_l_mm" name="prnt_size_l_mm" class="form-control prnt_size_l_mm" placeholder="Print size length (mm)" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="no_copies" class="">No. of Copied</label>
                            <input type="text" id="no_copies" name="no_copies" class="form-control no_copies" placeholder="Number of Copies" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="">Wastage Size in mm (width x length)</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" id="waste_size_w_mm" name="waste_size_w_mm" class="form-control waste_size_w_mm" placeholder="Wastage size width (mm)" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" id="waste_size_l_mm" name="waste_size_l_mm" class="form-control waste_size_l_mm" placeholder="Wastage size length (mm)" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="media_brand_id" class="">Media Brand</label>
                            <input type="text" id="media_brand_id" name="media_brand_id" class="form-control media_brand_id" placeholder="Media Brand" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="media_type_id" class="">Media Type / Name</label>
                            <input type="text" id="media_type_id" name="media_type_id" class="form-control media_type_id" placeholder="Media Type / Name" required>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="roll_number" class="">Roll Number</label>
                            <input type="text" id="roll_number" name="roll_number" class="form-control roll_number" placeholder="Roll Number" required>
                        </div>
                        <div class="col-lg-6 clearfix">
                            <label for="platform_id" class="">Platform</label><br />
                            <select name="platform_id" id="platform_id" class="form-control">
                                <option value="1">Rigid</option>
                                <option value="2">Flexi</option>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="media_used_w_mm" class="media_used_w_mm">Total media used for printing in mm (width)</label>
                            <input type="text" id="media_used_w_mm" name="media_used_w_mm" class="form-control media_used_w_mm" placeholder="Total media used for printing in mm (width)" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="density_id" class="density_id">Density</label>
                            <input type="text" id="density_id" name="density_id" class="form-control density_id" placeholder="Density" required>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="prnt_speed" class="prnt_speed">Printing Speed</label>
                            <input type="text" id="prnt_speed" name="prnt_speed" class="form-control prnt_speed" placeholder="Printing Speed" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="prnt_mode_id" class="prnt_mode_id">Print Mode</label>
                            <input type="text" id="prnt_mode_id" name="prnt_mode_id" class="form-control prnt_mode_id" placeholder="Print Mode" required>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="direction" class="direction">Directional</label>
                            <select name="direction" id="direction" class="form-control direction">
                                <option value="UNI">UNI</option>
                                <option value="BI">BI</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="prnt_qlty_id" class="prnt_qlty_id">Print Quality</label>
                            <input type="text" id="prnt_qlty_id" name="prnt_qlty_id" class="form-control prnt_qlty_id" placeholder="Print Quality" required>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="	carriage_h_mm" class="	carriage_h_mm">Carriage Heigt (mm)</label>
                            <input type="text" id="	carriage_h_mm" name="	carriage_h_mm" class="form-control 	carriage_h_mm" placeholder="Carriage Heigt (mm)" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="head_elevation" class="head_elevation">Head Elevation</label>
                            <input type="text" id="head_elevation" name="head_elevation" class="form-control head_elevation" placeholder="Head Elevation" required>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="passes" class="passes">Passes</label>
                            <input type="text" id="passes" name="passes" class="form-control passes" placeholder="Passes" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="curing_power" class="curing_power">Curing Power</label>
                            <input type="text" id="curing_power" name="curing_power" class="form-control curing_power" placeholder="Curing Power" required>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="shutter_mode_id" class="shutter_mode_id">Shutter Mode</label>
                            <input type="text" id="	shutter_mode_id" name="shutter_mode_id" class="form-control shutter_mode_id" placeholder="Shutter Mode" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="ink_used_rtl" class="ink_used_rtl">Ink used as per RTL</label>
                            <input type="text" id="ink_used_rtl" name="ink_used_rtl" class="form-control ink_used_rtl" placeholder="Ink used as per RTL" required>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group clearfix">
                        <div class="col-lg-6">
                            <label for="prnt_time" class="prnt_time">Print Time (in mins)</label>
                            <input type="text" id="prnt_time" name="prnt_time" class="form-control prnt_time" placeholder="Print Time (in minutes)" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="">&nbsp;</label><br />
                            <input type="button" value="Save" class="btn btn-success">
                            <input type="button" value="Cancel" class="btn btn-warning">
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
