<?php
	$pageTitle = "Login";
	require_once('config.php');
	include_once('header.php');
	#check_login();

	if( isset( $_POST['submit'])) :

		#var_dump( 'submit' );


		$loginid 	= $_POST['loginid'];
		$password 	= $_POST['password'];
		$redirect 	= $_POST['redirect'];

		#var_dump( $loginid.'-'.$password.'-'.$redirect);

		if( empty( $loginid ) || empty( $password ) ) {
			$error = '<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					Enter a valid username / password
				</div>';
		}

		if( !empty( $loginid ) && !empty( $password ) ) {
			#var_dump( 'check database' );
			$user = $database->select("user", array('uid', 'loginid', 'password'), [
						"AND" => [
							"loginid" 	=> $loginid,
							"password" 	=> make_password( $password )
						]
					]);

			if( $user == false ) {
				$error = '<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					Username / Password is incorrect.
				</div>';
			} else {
				$database->update("user",
					["last_login" => date('Y-m-d H:i:s')],
					["uid" => $user['0']['uid']]
				);

				#var_dump('update_login & userlogin');
				user_login( $loginid, $password, $redirect );
				exit();
			}

		}

	endif;
?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<form class="form-signin" method="POST" action="<?php echo SITEURL.$_SERVER['PHP_SELF']; ?>">
					<h2 class="form-signin-heading">Please sign in</h2>

					<div class="gap">
						<?php
							if(isset($error)):
								echo $error;
							endif;
						?>
					</div>

					<div class="gap">
						<label for="loginid" class="sr-only">Username</label>
				    	<input type="text" id="loginid" name="loginid" class="form-control" placeholder="Username" value="<?php echo (isset($_POST['loginid'])) ? $_POST['loginid'] : ''; ?>" required autofocus />
					</div>

					<div class="gap">
				    	<label for="password" class="sr-only">Password</label>
				    	<input type="password" id="password" name="password" class="form-control" placeholder="Password" required />
					</div>

			        <div class="gap hidden">
			        	<label>
			            	<input type="checkbox" value="remember-me"> Remember me
			          	</label>
			        </div>

			        <div class="gap">
			        	<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="submit">Sign in</button>
			        	<input type="hidden" name="redirect" value="<?php echo (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : '/index.php?no-redirect'; ?>">
			        </div>

			    </form>

			</div>
		</div>
	</div><!-- /.container -->

<?php
	include_once("footer.php");
?>
