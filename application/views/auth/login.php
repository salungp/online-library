<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>

	<form action="https://salung.000webhostapp.com/auth/auth_login" method="post">
		<h3>Login</h3>
		<p style="color: red;"><?= $this->session->flashdata('message'); ?></p>
		<label for="email">Email</label><br>
		<input type="text" name="email" id="email" value="<?= set_value('email'); ?>"><br>
		<small style="color: red;"><?= form_error('email'); ?></small><br>
		<label for="password">Password</label><br>
		<input type="password" name="password" id="password"><br>
		<small style="color: red;"><?= form_error('password'); ?></small><br>
		<button type="submit">Login</button>
	</form>

	<p>Belum punya akun?,sini <a href="https://salung.000webhostapp.com/register">daftar</a></p>

</body>
</html>