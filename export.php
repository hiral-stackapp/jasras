<?php
	$pageTitle = "Tools";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');
?>


<div class="container">
	<div class="row">
		<div class="col-lg-12"><h1 class="pagetitle">Export Data</h1></div>
		<div class="col-lg-12">
			<form class="form-export" method="POST" action="">
				<div class="gap">

				</div>

				<div class="row">
					<div class="form-group clearfix">
						<div class="col-lg-3">
							<label for="client_id" class="">Client Name</label>
							<select data-placeholder="Select" class="form-control chosen-select" name="client_id" id="client_id" tabindex="<?=$idx++;?>" required autofocus>
								<option value="0">All</option>
								<option disabled="disabled"></option>
								<?php
									$clientlist = $database->select("clients", "*", ['ORDER' => 'client_name ASC']);
									if($clientlist):
										foreach( $clientlist AS $client ) :
								?>
								<option value="<?php echo $client['client_id'];?>"><?php echo $client['client_name'];?></option>
								<?php
										endforeach;
									endif;
								?>
							</select>
						</div>
						<div class="col-lg-3">
							<label for="machine_id" class="">Printer Name</label>
							<select data-placeholder="Select" class="form-control chosen-select" name="machine_id" id="machine_id" class="form-control" required>
								<option value="0">All</option>
								<option disabled="disabled"></option>
								<?php
									$machines = $database->select("machine", "*",['ORDER' => 'machine_label ASC']);
									if( $machines ):
										foreach( $machines AS $machine ) :
								?>
								<option value="<?php echo $machine['machine_id'];?>"><?php echo $machine['machine_label'];?></option>
								<?php
										endforeach;
									endif;
								?>
							</select>
						</div>
						<div class="col-lg-3">
							<label for="year" class="">Year</label><br />
							<?php
								$files = $database->select("tbl_selector", "*", ['ORDER' => 'tbl_year DESC']);
								if( $files ):
							?>
							<select data-placeholder="Select" class="form-control chosen-select" name="year" id="year" class="form-control" required>
								<?php
									foreach( $files AS $file ) :
								?>
								<option value="<?php echo $file['tbl_id'];?>" data-parent="<?php echo $file['tbl_parent'];?>" data-child="<?php echo $file['tbl_child'];?>"><?php echo $file['tbl_year'];?></option>
								<?php
									endforeach;
								?>
							</select>
							<?php endif; ?>
						</div>
						<div class="col-lg-3">
						<label for="" class="">&nbsp;</label><br />
							<input type="button" value="Search" id="export_search" class="btn btn-info">
						</div>
					</div>
				</div>

				<div class="row" id="result">
					<div class="form-group clearfix">
						<div class="col-lg-9">
							<label for="" class="">&nbsp;</label><br />
							<p class="text-info text-center" style="display: none">Total <b><span>0</span></b> Record(s) found.</p>
							<div class="placeholder text-warning text-center"></div>
						</div>
						<div class="col-lg-3" id="downloadbtn">
							<label for="" class="">&nbsp;</label><br />
							<input type="button" value="View" id="export_view" class="btn btn-warning">
							<input type="button" value="Download" id="export_download" class="btn btn-success">
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