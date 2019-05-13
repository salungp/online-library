<div class="container ml-auto">
	
	<form action="https://salung.000webhostapp.com/auth/auth_register" method="POST" style="width: 450px;max-width: 450px;padding: 20px;box-sizing: border-box;">

		<h3>Register</h3>
		
		<div class="content">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?= set_value('name'); ?>">
			<small style="color: red;"><?= form_error('name'); ?></small><br>
		</div>

		<div class="content">
			<label for="enail">Email</label>
			<input type="text" name="email" id="enail" class="form-control" value="<?= set_value('email'); ?>">
			<small style="color: red;"><?= form_error('email'); ?></small><br>
		</div>

		<div class="content">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control">
			<small style="color: red;"><?= form_error('password'); ?></small><br>
		</div>

		<br>

		<button type="submit" class="btn btn-primary">Sign Up</button>

		<p>Sudah punya akun?, <a href="https://salung.000webhostapp.com/login">Login</a></p>

	</form>

</div>