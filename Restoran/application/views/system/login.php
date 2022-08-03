<div class="main">
<!-- Sing in  Form -->
<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
						<figure><img src="<?= base_url('assets/'); ?>images/auth/sample2.jpg" alt="sing up image"></figure>
					</div>

					<div class="signin-form">
						<h2 class="form-title">Log In</h2>
						<?= $this->session->flashdata('notif'); ?>
						<form method="POST" action="<?= base_url('auth') ?>" class="register-form" id="login-form">
							
							<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
							<div class="form-group">
								<label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" name="name" id="your_name" placeholder="Full Name" value="<?= set_value('name') ?>" />
							</div>
							
							<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
							<div class="form-group">
								<label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="username" name="username" id="username" placeholder="Username" value="<?= set_value('username') ?>" />
							</div>
								
								
							<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							<div class="form-group">
								<label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
								<input type="password" name="password" id="your_pass" placeholder="Password" />
							</div>
							<div class="form-group form-button">
								<input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
