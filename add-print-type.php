<?php
	$pageTitle = "Add Print Type";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');

	adminOnly();
?>
<?php
	if( isset($_POST['submit']) ) {

		if( empty($_POST['prnt_type_name']) || !isset($_POST['prnt_type_name']) || strlen($_POST['prnt_type_name']) < 1 ) {
			$errorMsg = array("<b>Error:</b>","Print Mode cannot be empty!");
		}

		if( strlen($_POST['prnt_type_name']) > 1 ) {
			$prnt_type_name = trim($_POST['prnt_type_name']);

			$result = $database->select("print_type", "*", ["prnt_type_name" => "$prnt_type_name"]);
			if( !empty( $result ) ) {
				$errorMsg = array("<b>Error:</b>","Print Mode <b>[".$prnt_type_name."]</b> already exist!");
			} else {
				$prnt_type_id = $database->insert("print_type", ["prnt_type_name" => "$prnt_type_name"]);
				if( $prnt_type_id ) {
					$successMsg = array("<b>".$prnt_type_name."</b>","Successfully added to database!");
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
							<label for="prnt_type_name" class="prnt_type_name">Print Quality</label>
							<input type="text" id="prnt_type_name" name="prnt_type_name" class="form-control input-lg" placeholder="Print Quality" required autofocus>
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
		$items = $database->select("print_type", "*",['ORDER' => 'prnt_type_id DESC']);
		if($items):
	?>
	<div class="row">
		<div class="col-lg-12" id="list">
			<h3>All Print Type</h3>
			<dl class="dl-horizontal">
				<dt>ID</dt>
				<dd>NAME</dd>
				<?php foreach( $items AS $item ) : ?>
				<dt><i><?=$item['prnt_type_id'];?></i></dt>
				<dd><?=$item['prnt_type_name'];?></dd>
				<?php endforeach; ?>
			</dl>
		</div>
	</div>
<?php endif; ?>


</div><!-- /.container -->


<?php
	include_once("footer.php");
?>
