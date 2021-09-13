<?php
	$pageTitle = "User Registration";
	require_once('config.php');
	include_once('header.php');

	check_login();
	include_once('menu.php');

	adminOnly();

	if( isset( $_POST['submit'])) :


		#var_dump( $_POST );


		$fullname		= ( isset($_POST['fullname']) ) 	? $_POST['fullname'] 		: '';
		$loginid 		= ( isset($_POST['loginid']) ) 		? $_POST['loginid'] 		: '';
		$password 	= ( isset($_POST['password']) ) 	? $_POST['password'] 		: '';
		$email			= ( isset($_POST['email']) ) 			? $_POST['email'] 			: '';
		$user_type	= ( isset($_POST['user_type']) ) 	? $_POST['user_type'] 	: '';
		$active 		= 'yes';
		$created_on	= date('Y-m-d H:i:s');
		$error 			= 1;

		#var_dump( $loginid.'-'.$password.'-'.$redirect);

		if( empty( $loginid ) || empty( $password ) || empty( $email ) || empty( $user_type ) ) {
			$message = '<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					All fields are required!
				</div>';
			$error = '0';
		}

		#print_r( 'error:'. $error.'<br />' );

		if( $error == 1 ) {
			$user = $database->select("user", array('uid', 'loginid', 'password', 'user_type'), [
						"OR" => [
							"email" 	=> $email,
							"loginid"	=> $loginid
						]
					]);

			if( $user ) {
				$message = '<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					Sorry, username/email address is already registered!
				</div>';
			} else {
				$database->insert("user",
					[
						"loginid" => $loginid,
						"password" => make_password($password),
						"user_type" => $user_type,
						"fullname" => $fullname,
						"email" => $email,
						"active" => $active,
						"created_on" => $created_on
					]
				);

				$message = '<div class="alert alert-success" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					User: <strong>'. $loginid .' ('.$email.') </strong> successfully registered as <strong>'. $user_type .'</strong>
				</div>';
			}
		}

	endif;
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form class="form-signin" method="POST" action="<?php echo SITEURL.$_SERVER['PHP_SELF']; ?>">
					<h2 class="form-signin-heading">Register User</h2>

					<div class="gap">
						<?php
							if(isset($message)):
								echo $message;
							endif;
						?>
					</div>

					<div class="gap">
						<label for="loginid" class="sr-only">Full Name</label>
						<input type="text" id="fullname" name="fullname" class="form-control" placeholder="Full Name" value="<?php echo (isset($_POST['fullname'])) ? $_POST['fullname'] : ''; ?>" required autofocus />
					</div>

					<div class="gap">
						<label for="loginid" class="sr-only">Username</label>
						<input type="text" id="loginid" name="loginid" class="form-control" placeholder="Username" value="<?php echo (isset($_POST['loginid'])) ? $_POST['loginid'] : ''; ?>" required />
					</div>

					<div class="gap">
							<label for="password" class="sr-only">Password</label>
							<input type="password" id="password" name="password" class="form-control" placeholder="Password" required />
					</div>

					<div class="gap">
							<label for="email" class="sr-only">Email</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" required />
					</div>


					<div class="gap">
						<select class="form-control" name="user_type">
							<option disabled selected>-User Type-</option>
							<option value="client">Client</option>
							<option value="staff">Staff</option>
							<option value="admin">Admin</option>
						</select>
					</div>

					<div class="gap">
						<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="submit">Register</button>
					</div>


				</form>

			</div>
		</div>
	</div><!-- /.container -->

<?php
	include_once("footer.php");
?>
