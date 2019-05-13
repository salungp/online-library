<div class="content-wrapper">
	<h1 class="text-subheading">Edit Profile</h1>
	<hr>
	<div class="col-md-6 col-lg-6 col-sm-7 col-xs-12">
		<form action="https://salung.000webhostapp.com/auth/auth_edit" method="post">
			<label for="nama" class="text">Nama :</label><br>
			<input type="text" name="name" class="form-control" id="nama" value="<?= $user_data['name']; ?>">
			<small style="color: red;"><?= form_error('name'); ?></small>
			<label for="email" class="text">Email :</label><br>
			<input type="text" name="email" class="form-control" id="email" value="<?= $user_data['email']; ?>">
			<small style="color: red;"><?= form_error('email'); ?></small>
			<button type="submit" class="btn-salung">Simpan</button>
		</form>
	</div>
</div>