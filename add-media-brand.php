<?php
	$pageTitle = "Add Media Brand Name";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');

	adminOnly();
?>
<?php
	if( isset($_POST['submit']) ) {

		if( empty($_POST['media_brand_name']) || !isset($_POST['media_brand_name']) || strlen($_POST['media_brand_name']) < 1 ) {
			$errorMsg = array("<b>Error:</b>","Media brand name cannot be empty!");
		}

		if( strlen($_POST['media_brand_name']) > 1 ) {
			$media_brand_name = $_POST['media_brand_name'];

			$client = $database->select("media_brand", "*", ["media_brand_name" => "$media_brand_name"]);
			if( !empty( $client ) ) {
				$errorMsg = array("<b>Error:</b>","Media brand name already exist!");
			} else {
				$media_brand_id = $database->insert("media_brand", ["media_brand_name" => "$media_brand_name"]);
				if( $media_brand_id ) {
					$successMsg = array("<b>".$media_brand_name."</b>","Successfully added to database!");
				}
			}
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>
		<div class="col-lg-12">
			<form class="form-add-media_brand" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

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
							<label for="media_brand_name" class="media_brand_id">Media Brand Name</label>
							<input type="text" id="media_brand_name" name="media_brand_name" class="form-control input-lg" placeholder="Media Brand Name" required autofocus>
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
		$items = $database->select("media_brand", "*", ['media_brand_status' => '1', 'ORDER' => 'media_brand_name ASC']);
		if($items):
	?>
	<div class="row">
		<div class="col-lg-12" id="list">
			<h3>All Media Brand Name</h3>
			<dl class="dl-horizontal">
				<dt>ID</dt>
				<dd>NAME</dd>
				<?php foreach( $items AS $item ) : ?>
				<dt class="row_<?=$item['media_brand_id'];?>"><i><?=$item['media_brand_id'];?></i></dt>
				<dd class="row_<?=$item['media_brand_id'];?>">
					<?=$item['media_brand_name'];?>
					<a href="?action=delete_brand&brand_id=<?php echo $item['media_brand_id']; ?>" style="color: #3d3d3d; text-decoration: none" class="pull-right deleteBrand" data-id=".row_<?php echo $item['media_brand_id'];?>" data-brand-name="<?php echo $item['media_brand_name'];?>">
						<span class="glyphicon btn-glyphicon glyphicon-trash" style="color: #3d3d3d; margin-right: 5px;"></span> DELETE
					</a>
				</dd>
				<?php endforeach; ?>
			</dl>
		</div>
<?php endif; ?>


</div><!-- /.container -->


<?php
	include_once("footer.php");
?>
