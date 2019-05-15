<div class="content-wrapper">
	<div class="container">
		
		<form action="http://localhost/perpustakaan-online/auth/auth_register" method="POST">

			<h3>Register</h3>
			
			<div class="content">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" value="<?= set_value('name'); ?>" class="input">
				<small style="color: red;"><?= form_error('name'); ?></small>
			</div>

			<div class="content">
				<label for="enail">Email</label>
				<input type="text" name="email" id="enail" value="<?= set_value('email'); ?>" class="input">
				<small style="color: red;"><?= form_error('email'); ?></small>
			</div>

			<div class="content">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="input">
				<small style="color: red;"><?= form_error('password'); ?></small>
				<input type="checkbox" id="showPassword">
				<label style="margin-left: 7px;" id="text-info">Show Password</label>
			</div>

			<button type="submit">Sign Up</button>

			<p>Sudah punya akun?, <a href="http://localhost/perpustakaan-online/login">Login</a></p>

		</form>

	</div>
</div>