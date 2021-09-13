<?php
	$pageTitle = "Add New Density";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');

	adminOnly();
?>
<?php
	if( isset($_POST['submit']) ) {

		if( empty($_POST['density_name']) || !isset($_POST['density_name']) || strlen($_POST['density_name']) < 1 ) {
			$errorMsg = array("<b>Error:</b>","Density cannot be empty!");
		}

		if( strlen($_POST['density_name']) > 1 ) {
			$density_name = $_POST['density_name'];

			$client = $database->select("density", "*", ["density_name" => "$density_name"]);
			if( !empty( $client ) ) {
				$errorMsg = array("<b>Error:</b>","Density already exist!");
			} else {
				$density_id = $database->insert("density", ["density_name" => "$density_name"]);
				if( $density_id ) {
					$successMsg = array("<b>".$density_name."</b>","Successfully added to database!");
				}
			}
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>
		<div class="col-lg-12">
			<form class="form-add-density" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

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
							<label for="density_name" class="density_id">Density</label>
							<input type="text" id="density_name" name="density_name" class="form-control input-lg" placeholder="Density" required autofocus>
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
		$items = $database->select("density", "*",['ORDER' => 'density_id DESC']);
		if($items):
	?>
	<div class="row">
		<div class="col-lg-12" id="list">
			<h3>All Density</h3>
			<dl class="dl-horizontal">
				<dt>ID</dt>
				<dd>NAME</dd>
				<?php foreach( $items AS $item ) : ?>
				<dt><i><?=$item['density_id'];?></i></dt>
				<dd><?=$item['density_name'];?></dd>
				<?php endforeach; ?>
			</dl>
		</div>
	</div>
<?php endif; ?>


</div><!-- /.container -->


<?php
	include_once("footer.php");
?>
