<?php
	$pageTitle = "Add Print Mode";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');

	adminOnly();
?>
<?php
	if( isset($_POST['submit']) ) {

		if( empty($_POST['prnt_mode_name']) || !isset($_POST['prnt_mode_name']) || strlen($_POST['prnt_mode_name']) < 1 ) {
			$errorMsg = array("<b>Error:</b>","Print Mode cannot be empty!");
		}

		if( strlen($_POST['prnt_mode_name']) > 1 ) {
			$prnt_mode_name = trim($_POST['prnt_mode_name']);

			$result = $database->select("print_mode", "*", ["prnt_mode_name" => "$prnt_mode_name"]);
			if( !empty( $result ) ) {
				$errorMsg = array("<b>Error:</b>","Print Mode <b>[".$prnt_mode_name."]</b> already exist!");
			} else {
				$prnt_mode_id = $database->insert("print_mode", ["prnt_mode_name" => "$prnt_mode_name"]);
				if( $prnt_mode_id ) {
					$successMsg = array("<b>".$prnt_mode_name."</b>","Successfully added to database!");
				}
			}
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>
		<div class="col-lg-12">
			<form class="form-add-media_type" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

				<div class="gap">
					<?php
						if(isset( $errorMsg )):
					?>
						<div class="row" id="errorMsg">
							<div class="col-lg-12">
								<div class="alert alert-danger clearfix" role="alert">
									<div class="col-lg-1">
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									</div>
									<div class="col-lg-11">
										<ul>
										<?php foreach($errorMsg AS $text ) : ?>
											<li><?=$text;?></li>
										<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php
						endif;
					?>


					<?php
						if(isset( $successMsg )):
					?>
						<div class="row" id="successMsg">
							<div class="col-lg-12">
								<div class="alert alert-success clearfix" role="alert">
									<div class="col-lg-1">
										<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									</div>
									<div class="col-lg-11">
										<ul>
										<?php foreach($successMsg AS $text ) : ?>
											<li><?=$text;?></li>
										<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php
						endif;
					?>




				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label for="prnt_mode_name" class="prnt_mode_id">Print Mode</label>
							<input type="text" id="prnt_mode_name" name="prnt_mode_name" class="form-control input-lg" placeholder="Print Mode" required autofocus>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<input type="submit" name="submit" value="Save" class="btn btn-success input-lg pull-right">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php
		// http://simplemvcframework.com/documentation/v2/pagination-class
		$items = $database->select("print_mode", "*",['ORDER' => 'prnt_mode_id DESC']);
		if($items):
	?>
	<div class="row">
		<div class="col-lg-12" id="list">
			<h3>All Print Mode</h3>
			<dl class="dl-horizontal">
				<dt>ID</dt>
				<dd>NAME</dd>
				<?php foreach( $items AS $item ) : ?>
				<dt><i><?=$item['prnt_mode_id'];?></i></dt>
				<dd><?=$item['prnt_mode_name'];?></dd>
				<?php endforeach; ?>
			</dl>
		</div>
	</div>
<?php endif; ?>


</div><!-- /.container -->


<?php
	include_once("footer.php");
?>
