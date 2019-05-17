
	<div class="row">
		<?php if (count($buku) <= 0) : ?>

			<h1 class="text-heading">Tidak ada hasil yang ditampilkan!</h1>

		<?php else : ?>
			<?php foreach ($buku as $data) : ?>
				<div class="col-xs-2 col-sm-3 col-md-3 col-lg-3" style="box-sizing: border-box;">
					<div class="card mb-4">
					  <div class="card-body">

					  	<?php if (strlen($data['judul']) > 17) : ?>

					    	<h5 class="card-title"><?= substr($data['judul'], 0, 17); ?>...</h5>

					    <?php else : ?>

					    	<h5 class="card-title"><?= $data['judul']; ?></h5>

					    <?php endif; ?>

					    <?php if ($data['status'] == 1) : ?>

							<div class="badge badge-danger">Dipinjam</div>

						<?php else : ?>

							<div class="badge badge-success">Belum Dipinjam</div>

						<?php endif; ?>

						<br>

						<a style="font-size: 11px;"><i class="far fa-clock" style="margin-right: 4px;font-size: 11px;"></i> 24 mnt ago</a>

					    <p class="text" style="margin-bottom: 10px;"><?= substr($data['deskripsi'], 0, 40); ?>...</p>
					    <a href="<?= base_url('detail/' . $data['id']); ?>" class="btn-salung">Detail</a>
					  </div>
					  <div class="card-footer">
					  	<button class="clean" style="margin-right: 20px;"><i class="fas fa-thumbs-up"></i> Suka</button>
					  	<button class="clean"><i class="fas fa-comment-alt"></i> Komentar</button>
					  </div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>