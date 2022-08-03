<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Silahkan login</title>

	<!-- Font Icon -->
	<link rel="stylesheet" href="<?= base_url('assets/Login/') ?>fonts/material-icon/css/material-design-iconic-font.min.css">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>Bootstrap/css/bootstrap.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="<?= base_url('assets/Login/') ?>css/style.css">
</head>

<body>

	<div class="main" style="padding: 50px 0; background: #f8f8f8;">

		<!-- Login  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
				<!-- Image  -->
				<div class="signin-image">
						<figure><img src="<?= base_url('assets/Login/') ?>images/1.jpg" alt="sing up image"></figure>
					</div>

				<!-- Form -->
					<div class="signin-form">
						<h2 style="font-size: 34px;"class="form-title">Silahkan masukkan akun anda</h2>

					<!-- Alert -->
						<?= $this->session->flashdata('notif'); ?>

						<form method="POST"action="<?= base_url('masuk'); ?>" class="register-form" id="login-form">
					<!-- Username input -->
						<?= form_error('username', '<small class="text-danger">', '</small>') ?>
							<div class="form-group">
								<label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" name="username" id="username" placeholder="Username Anda" />
							</div>

					<!-- Password input -->
						<?= form_error('password', '<small class="text-danger">', '</small>') ?>
							<div class="form-group">
								<label for="password"><i class="zmdi zmdi-lock"></i></label>
								<input type="password" name="password" id="password" placeholder="Password" />
							</div>
							
						<!-- Button submit -->
							<div class="form-group form-button">
								<input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
							</div>
						</form>
				<!-- End Form -->


				<!-- Social Media -->
						<!-- <div class="social-login">
							<span class="social-label">Or login with</span>
							<ul class="socials">
								<li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
								<li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
								<li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
							</ul>
						</div> -->
				<!-- End Social Media -->


					</div>
				</div>
			</div>
		</section>

	</div>

	<!-- JS -->
	<script src="<?= base_url('assets/Login/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/Login/') ?>js/main.js"></script>

	<!-- Bootstrap -->
	<script src="<?= base_url('assets/') ?>Bootstrap/js/bootstrap.min.js"></script>
</body>

<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
