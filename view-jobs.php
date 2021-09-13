<?php
	$pageTitle = "View All Jobs";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>
	</div>

	<?php
		$results = $database->select('jobs',
			[
				"[>]clients" => ["client_id" => "client_id"]
			],
			'*',
			[
				"ORDER" => ["clients.client_name ASC", "jobs.job_id ASC"]
			]);
		#var_dump( $results );

		foreach( $results AS $result ) :
			$alljobs[ $result['client_name'] ][] = array(
																							'job_id' 			=> $result['job_id'],
																							'client_name' => $result['client_name'],
																							'client_id' 	=> $result['client_id'],
																							'created_on' 	=> $result['created_on'],
																							);

		endforeach;
	?>


	<div class="row">
		<div class="col-lg-12">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

				<?php
					$id = '0';
					foreach( $alljobs AS $clientname => $clientdata ):
						$id++;
				?>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading_<?=$id;?>">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?=$id;?>" aria-expanded="false" aria-controls="collapse_<?=$id;?>">
								<?php echo $clientname; ?>
							</a>
						</h4>
					</div>
					<div id="collapse_<?=$id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?=$id;?>">
						<div class="panel-body">
							<ul class="tree">
							<?php
								foreach( $clientdata AS $v ) :
							?>
								<li class="">
									<a href="<?php echo SITEURL; ?>/add-job.php?job_id=<?php echo $v['job_id']; ?>"><?php echo $v['job_id']; ?></a>
									<?php
										$printdata = $database->select(
												'jobs_meta',

												[
												"[>]rtlname" => ["rtl_id" => "rtl_id"]
												],

												'*',

												[
													"AND" => [
														'job_id' => $v['job_id'],
														'status' => '1'
													],
													'ORDER' => 'jobs_meta.job_date DESC',
												]

										);

										#var_dump( $database->log() );
										if( $printdata == true ):
									?>
									<ul>
									<?php
										foreach( $printdata AS $data ):
									?>
									<li>
										<span>
											ID: <?php echo $data['jmsid'];?>
										</span>

										<a href="single-job.php?id=<?php echo $data['jmsid'];?>" class="actionBtn"> <i class="glyphicon glyphicon-list-alt"></i> VIEW</a>


										 <a href="add-job.php?action=clone&id=<?php echo $data['jmsid'];?>&job_id=<?php echo $data['job_id'];?>" style="margin-left: 10px" class="actionBtn"><i class="glyphicon glyphicon-transfer"></i> CLONE</a>

										 <a href="edit-job.php?action=edit&id=<?php echo $data['jmsid'];?>&job_id=<?php echo $data['job_id'];?>" style="margin-left: 10px" class="actionBtn"><i class="glyphicon glyphicon-pencil"></i> Edit</a>

										 <span class="jobdate"><?php echo date('d/m/Y',strtotime($data['job_date']));?></span>

									</li>
									<?php
										endforeach;
									?>
									</ul>
									<?php else: ?>
										<p class="empty">empty</p>
									<?php endif; ?>
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
</div> <!-- container -->


<?php
	include_once("footer.php");
?>
