<div class="container">
	<?= $this->session->flashdata('message'); ?>

	<div class="link">
		<a href="https://salung.000webhostapp.com/">Home  </a>&raquo;  <a href="https://salung.000webhostapp.com/profile">Profile  </a>&raquo;  <a><?= $_SESSION['name']; ?></a>
	</div>

	<div class="row">
		
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="sidebar mb-4">
				<div class="force-center">
					<div class="img-content">
						<img class="profile-image" src="https://salung.000webhostapp.com/assets/images/foto_profile/<?= $user_data['profile_image']; ?>" width="200">
						<label for="foto" class="label-img btn-salung">Ubah</label>

						<form action="profile/foto" method="post" enctype="multipart/form-data">
							<input type="file" name="foto" id="foto">
							<button type="submit" class="btn-salung clean center upload">Simpan</button>
						</form>
					</div>
				</div>
				<h1 class="text-subheading text-center clean"><?= $user_data['name']; ?></h1>
				<p class="text text-center mb-5 clean"><?= $user_data['email']; ?></p>
				<a href="https://salung.000webhostapp.com/profile/edit" class="edit">Edit Profile</a>
			</div>
		</div>

		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class="content-wrapper">
				<a class="text pb-2">Buku yang dipinjam :</a>
				<a class="text text-right pb-2"><?= $jumlah_buku; ?></a>
				<hr>
				<div class="content" style="clear: both;">
					<?php if (count($buku) == 0) : ?>
						<div class="jumbotron">
							<h4 class="text-subheading">Anda belum meminjam buku apapun</h4>
							<p class="text pb-3">Ayo pinjam sekarang dan baca sampai selesai!</p>
							<a href="https://salung.000webhostapp.com/" class="btn-salung">Jelajahi Perpustakaan</a>
						</div>
					<?php endif; ?>

					<div class="row">
						<?php foreach ($buku as $data) : ?>
								<div class="col-md-4 mb-2">
									<div class="card">
									  <div class="card-body">
									  	<h5 class="card-title"><?= $data['buku']; ?></h5>
									    <?php if ($data['atribut'] == 'jam') : ?>
									    	<?php if (($data['lama_pinjam'] - date('G')) <= 0) : ?>
									    		<div class="alert alert-danger">Maaf buku anda sudah jatuh tempo!,mohon segera kembalikan ke perpustakaan.</div>
									    		<p class="text mb-3" style="color: red;">Waktu Habis!</p>
									    	<?php else : ?>
									    		<h6>Sisa <?= $data['lama_pinjam'] - date('G'); ?> <?= $data['atribut']; ?> lagi!</h6>
									    	<?php endif; ?>
									    <?php elseif ($data['atribut'] == 'hari') : ?>
									    	<?php if (($data['lama_pinjam'] - date('j')) <= 0) : ?>
									    		<div class="alert alert-danger">Maaf buku anda sudah jatuh tempo!,mohon segera kembalikan ke perpustakaan.</div>
									    		<p class="text mb-3" style="color: red;">Waktu Habis!</p>
									    	<?php else : ?>
									    		<h6>Sisa <?= $data['lama_pinjam'] - date('j'); ?> <?= $data['atribut']; ?> lagi!</h6>
									    	<?php endif; ?>
									    <?php endif; ?>
									    <form action="https://salung.000webhostapp.com/home/kembalikan" method="post">
									    	<input type="hidden" name="user" value="<?= $_SESSION['name']; ?>">
									    	<input type="hidden" name="buku" value="<?= $data['buku']; ?>">
									    	<button type="submit" class="btn-salung">Kembalikan</button>
									    </form>
									  </div>
									</div>
								</div>
						<?php endforeach; ?>
					</div>
					<hr>
				</div>
				<h1 class="text-subheading">Donasi Buku</h1>
				<hr>
				<p class="text mb-3">
					Jika anda mempunyai buku yang sudah jarang anda baca dan sekiranya masih layak untuk didonasikan Ayo sumbangkanlah buku anda!
				</p>
				<a href="https://salung.000webhostapp.com/profile/donasi" class="btn-salung">Donasi Buku</a>
			</div>
		</div>

	</div>

</div>
