<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>

	<div class="content-wrapper">
		<div class="container">
			<div class="auth-box">
				<form action="http://localhost/perpustakaan-online/auth/auth_login" method="post">
					<h3>Login</h3>
					<p style="color: red;"><?= $this->session->flashdata('message'); ?></p>
					<label for="email">Email</label>
					<input type="text" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="Email" class="input">
					<small style="color: red;"><?= form_error('email'); ?></small>
					<label for="password">Password</label>
					<input type="password" name="password" id="password" placeholder="*********" class="input">
					<small style="color: red;"><?= form_error('password'); ?></small>
					<input type="checkbox" id="showPassword">
					<label style="margin-left: 7px;" id="text-info">Show Password</label>
					<button type="submit">Login</button>
				</form>
				<p>Belum punya akun?,sini <a href="http://localhost/perpustakaan-online/register">daftar</a>
				</p>
			</div>
		</div>
	</div>

</body>
</html>