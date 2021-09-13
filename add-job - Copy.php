<?php
	$pageTitle = "Add New Job";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');
?>


<div class="container">
	<div class="row">
		<div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>
		<div class="col-lg-12">
			<form class="form-add-job" method="POST" action="">
				<div class="gap">

				</div>

				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-4">
							<label for="client_id" class="">Client Name</label>
							<select data-placeholder="Select" class="form-control chosen-select" name="client_id" required autofocus>
								<option value=""></option>
								<?php
									$results = $database->select("clients", "*",['ORDER' => 'client_name ASC']);
									foreach( $results AS $result ):
										echo "<option value='".$result['client_id']."'>".$result['client_name']."</option>";
									endforeach;
								?>
					        </select>
						</div>
						<div class="col-lg-4">
							<label for="rtl_name" class="">RTL Name</label>
							<input type="text" id="rtl_name" name="rtl_name" class="form-control" placeholder="RTL Name" required>
						</div>


					</div>
				</div>

				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-6">
							<label for="prnt_type_id" class="">Print Type</label><br />
							<select data-placeholder="Select" class="form-control chosen-select" name="prnt_type_id" required>
								<option value=""></option>
								<?php
									$results = $database->select("print_type", "*",['ORDER' => 'prnt_type_name ASC']);
									foreach( $results AS $result ):
										echo "<option value='".$result['prnt_type_id']."'>".$result['prnt_type_name']."</option>";
									endforeach;
								?>
					        </select>
						</div>
						<div class="col-lg-6">
							<label for="" class="">Print Size in mm (width x length)</label>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<input type="number" id="prnt_size_w_mm" name="prnt_size_w_mm" class="form-control prnt_size_w_mm" placeholder="Width" required>
									</div>
									<div class="col-lg-6">
										<input type="number" id="prnt_size_l_mm" name="prnt_size_l_mm" class="form-control prnt_size_l_mm" placeholder="Length" required>
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
							<input type="number" id="no_copies" name="no_copies" class="form-control no_copies" placeholder="0" required>
						</div>
						<div class="col-lg-6">
							<label for="" class="">Wastage Size in mm (width x length)</label>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<input type="number" id="waste_size_w_mm" name="waste_size_w_mm" class="form-control waste_size_w_mm" placeholder="Width" required>
									</div>
									<div class="col-lg-6">
										<input type="number" id="waste_size_l_mm" name="waste_size_l_mm" class="form-control waste_size_l_mm" placeholder="Length" required>
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
							<select data-placeholder="Select" class="form-control chosen-select" name="media_brand_id" required>
								<option value=""></option>
								<?php
									$results = $database->select("media_brand", "*",['ORDER' => 'media_brand_name ASC']);
									foreach( $results AS $result ):
										echo "<option value='".$result['media_brand_id']."'>".$result['media_brand_name']."</option>";
									endforeach;
								?>
					        </select>
						</div>
						<div class="col-lg-6">
							<label for="media_type_id" class="">Media Type / Name</label>
							<select data-placeholder="Select" class="form-control chosen-select" name="media_type_id" required>
								<option value=""></option>
								<?php
									$results = $database->select("media_type", "*",['ORDER' => 'media_type_name ASC']);
									foreach( $results AS $result ):
										echo "<option value='".$result['media_type_id']."'>".$result['media_type_name']."</option>";
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
							<input type="number" id="roll_number" name="roll_number" class="form-control roll_number" placeholder="000" required>
						</div>
						<div class="col-lg-6 clearfix">
							<label for="platform_id" class="">Platform</label><br />
							<select data-placeholder="Select" class="form-control chosen-select" name="platform_id">
								<option value=""></option>
								<?php
									$results = $database->select("platform", "*",['ORDER' => 'platform_type_name ASC']);
									foreach( $results AS $result ):
										echo "<option value='".$result['platform_id']."'>".$result['platform_type_name']."</option>";
									endforeach;
								?>
					        </select>
						</div>
					</div>
				</div>



				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-6">
							<label for="media_used_w_mm" class="media_used_w_mm">Total media used for printing in mm (width)</label>
							<input type="number" id="media_used_w_mm" name="media_used_w_mm" class="form-control media_used_w_mm" placeholder="Width" required>
						</div>
						<div class="col-lg-6">
							<label for="density_id" class="density_id">Density</label>
							<select data-placeholder="Select" class="form-control chosen-select" name="density_id">
								<option value=""></option>
								<?php
									$results = $database->select("density", "*",['ORDER' => 'density_name ASC']);
									foreach( $results AS $result ):
										echo "<option value='".$result['density_id']."'>".$result['density_name']."</option>";
									endforeach;
								?>
					        </select>
						</div>
					</div>
				</div>



				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-6">
							<label for="prnt_speed" class="prnt_speed">Printing Speed</label>
							<input type="number" id="prnt_speed" name="prnt_speed" class="form-control prnt_speed" placeholder="0" required>
						</div>
						<div class="col-lg-6">
							<label for="prnt_mode_id" class="prnt_mode_id">Print Mode</label>
							<select data-placeholder="Select" class="form-control chosen-select" name="prnt_mode_id">
								<option value=""></option>
								<?php
									$results = $database->select("print_mode", "*",['ORDER' => 'prnt_mode_name ASC']);
									foreach( $results AS $result ):
										echo "<option value='".$result['prnt_mode_id']."'>".$result['prnt_mode_name']."</option>";
									endforeach;
								?>
					        </select>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-6">
							<label for="direction" class="direction">Directional</label>
							<select data-placeholder="Select" class="form-control chosen-select" name="direction">
								<option value=""></option>
								<option value="UNI">UNI</option>
								<option value="BI">BI</option>
					        </select>
						</div>
						<div class="col-lg-6">
							<label for="prnt_qlty_id" class="prnt_qlty_id">Print Quality</label>
							<select data-placeholder="Select" class="form-control chosen-select" name="prnt_qlty_id">
								<option value=""></option>
								<?php
									$results = $database->select("print_quality", "*",['ORDER' => 'prnt_qlty_name ASC']);
									foreach( $results AS $result ):
										echo "<option value='".$result['prnt_qlty_id']."'>".$result['prnt_qlty_name']."</option>";
									endforeach;
								?>
					        </select>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-6">
							<label for="carriage_h_mm" class="	carriage_h_mm">Carriage Heigt (mm)</label>
							<input type="number" step="0.10" id="carriage_h_mm" name="carriage_h_mm" class="form-control carriage_h_mm" placeholder="0.00" required>
						</div>
						<div class="col-lg-6">
							<label for="head_elevation" class="head_elevation">Head Elevation</label>
							<input type="number" step="0.10" id="head_elevation" name="head_elevation" class="form-control head_elevation" placeholder="0.00" required>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-6">
							<label for="passes" class="passes">Passes</label>
							<input type="number" id="passes" name="passes" class="form-control passes" placeholder="00" required>
						</div>
						<div class="col-lg-6">
							<label for="curing_power" class="curing_power">Curing Power</label>
							<input type="number" id="curing_power" name="curing_power" class="form-control curing_power" placeholder="00" required>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-6">
							<label for="shutter_mode_id" class="shutter_mode_id">Shutter Mode</label>
							<select data-placeholder="Select" class="form-control chosen-select" name="shutter_mode_id">
								<option value=""></option>
								<?php
									$results = $database->select("shutter_mode", "*",['ORDER' => 'shutter_mode_name ASC']);
									foreach( $results AS $result ):
										echo "<option value='".$result['shutter_mode_id']."'>".$result['shutter_mode_name']."</option>";
									endforeach;
								?>
					        </select>
						</div>
						<div class="col-lg-6">
							<label for="ink_used_rtl" class="ink_used_rtl">Ink used as per RTL</label>
							<input type="number" step="0.10" id="ink_used_rtl" name="ink_used_rtl" class="form-control ink_used_rtl" placeholder="Ink used as per RTL" required>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-6">
							<label for="prnt_time" class="prnt_time">Print Time (in minutes)</label>
							<input type="number" id="prnt_time" name="prnt_time" class="form-control prnt_time" placeholder="0" required>
						</div>
						<div class="col-lg-6">
							<label for="" class="">&nbsp;</label><br />
							<input type="submit" name="submit" value="Save" class="btn btn-success pull-right">
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
