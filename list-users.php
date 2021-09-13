<?php
	$pageTitle = "All Users";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');

	adminOnly();
?>

<div class="container">

	<?php
		// http://simplemvcframework.com/documentation/v2/pagination-class
		$userslist = $database->select("user", "*",['ORDER' => 'uid DESC']);
		#var_dump( $userslist );

		if($userslist):
	?>
	<div class="row">
		<div class="col-lg-12" id="list">
			<h3>All Users</h3>


			<div class="table-responsive">
				<table class="table table-striped table-hover table-condensed">
					<thead>
						<tr>
							<th>Full Name</th>
							<th>Login ID</th>
							<th>Email</th>
							<th>User Type</th>
							<th>Registered On</th>
							<th>Last Seen</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php foreach( $userslist AS $user ) : ?>
						<tr>
							<td><?=$user['fullname'];?></td>
							<td><?=$user['loginid'];?></td>
							<td><?=$user['email'];?></td>
							<td>
								<select name="user_type" id="user_type">
									<option value="client" <?php echo ($user['user_type'] == 'client') ? 'selected=selected': ''; ?>>Client</option>
									<option value="admin" <?php echo ($user['user_type'] == 'admin') ? 'selected=selected': ''; ?>>Admin</option>
									<option value="staff" <?php echo ($user['user_type'] == 'staff') ? 'selected=selected': ''; ?>>Staff</option>
								</select>
							</td>
							<td><?= date('d/m/Y H:i:s', strtotime($user['created_on']));?></td>
							<td><?=$user['last_login'];?></td>
							<td>
								<select name="user_active" id="user_active">
									<option value="yes" <?php echo ($user['active'] == 'yes') ? 'selected=selected': ''; ?>>Active</option>
									<option value="no" <?php echo ($user['active'] == 'no') ? 'selected=selected': ''; ?>>Inactive</option>
								</select>
							</td>
							<td><button class="btn btn-default">UPDATE</button></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				 </table>
			</div>


		</div>
	</div>
<?php endif; ?>


</div><!-- /.container -->


<?php
	include_once("footer.php");
?>
