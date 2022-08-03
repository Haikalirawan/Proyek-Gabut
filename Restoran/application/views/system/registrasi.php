  
  <div class="main">
		<!-- Sign up form -->
		<section class="signup">
			<div class="container">
				<div class="signup-content">
					<div class="signup-form">
						<h2 class="form-title">Sign In</h2>
						<form method="POST" action="<?= base_url('auth/registrasi') ?>" class="register-form" id="register-form">
            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>  
            <div class="form-group">
								<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="name" id="name" placeholder="Full name" value="<?= set_value('name') ?>" />
              </div>
              <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
							<div class="form-group">
								<label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="username" name="username" id="username" placeholder="Username" value="<?= set_value('username') ?>" />
              </div>
              <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
							<div class="form-group">
								<label for="pass"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="pass" placeholder="Password (Min.&nbsp; 3 character)" />
              </div>
							<div class="form-group">
								<label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                <input type="password" name="password2" id="re_pass" placeholder="Confirm password" />
							</div>
							<div class="form-group form-button">
								<input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
							</div>
						</form>
					</div>
					<div class="signup-image">
						<figure><img src="<?= base_url('assets/'); ?>images/auth/sample1.jpg" alt="sing up image"></figure>
						<a href="<?= base_url('auth'); ?>" class="signup-image-link">I am already member</a>
					</div>
				</div>
			</div>
		</section>
  </div>

