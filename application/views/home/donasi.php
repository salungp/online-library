<div class="content-wrapper">
	<h1 class="text-subheading">Donasi Buku</h1>
	<hr>
	<div class="col-md-6 col-lg-6 col-sm-7 col-xs-12">
		<form action="https://salung.000webhostapp.com/donasi" method="post">

			<label for="judul" class="text">Judul Buku :</label><br>
			<input type="text" name="judul" class="form-control mb-2" id="judul" value="<?= set_value('judul'); ?>">

			<label for="penulis" class="text">Penulis Buku :</label><br>
			<input type="text" name="penulis" class="form-control mb-2" id="penulis" value="<?= set_value('penulis'); ?>">

			<label for="penerbit" class="text">Penerbit Buku :</label><br>
			<input type="text" name="penerbit" class="form-control mb-2" id="penerbit" value="<?= set_value('penerbit'); ?>">

			<label for="jumlah-halaman" class="text">Jumlah Halaman :</label><br>
			<input type="number" name="jumlah_halaman" class="form-control mb-2" id="jumlah-halaman" value="<?= set_value('jumlah_halaman'); ?>">

			<label for="kategori" class="text">Kategori Buku :</label><br>
			<select name="kategori" id="kategori">
				<option>Pendidikan</option>
				<option>Islam</option>
				<option>Novel</option>
			</select>

			<br>

			<label for="jumlah-bab" class="text">Jumlah BAB :</label><br>
			<input type="number" name="jumlah_bab" class="form-control mb-2" id="jumlah-bab" value="<?= set_value('jumlah_bab'); ?>">

			<label for="deskripsi" class="text">Deskripsi Buku :</label><br>
			<textarea id="deskripsi" class="form-control mb-2" name="deskripsi"><?= set_value('deskripsi'); ?></textarea>

			<label for="pesan" class="text">*Pesan (optional) :</label><br>
			<textarea id="pesan" class="form-control mb-2" name="pesan" placeholder="Masukkan pesan kepada pembaca buku yang akan anda donasikan."><?= set_value('pesan'); ?></textarea>

			<button type="submit" class="btn-salung">Simpan</button>

		</form>
	</div>
</div>