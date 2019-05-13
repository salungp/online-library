
	<div class="row" id="data">
		<?php if (count($buku) <= 0) : ?>

			<h1 class="text-heading">Tidak ada hasil yang ditampilkan!</h1>

		<?php else : ?>
			<?php foreach ($buku as $data) : ?>
				<div class="col-md-3 col-sm-4 col-xs-3 col-lg-3" style="box-sizing: border-box;">
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

					    <p class="text" style="margin-bottom: 10px;"><?= substr($data['deskripsi'], 0, 40); ?>...</p>
					    <a href="https://salung.000webhostapp.com/detail/<?= $data['id']; ?>" class="btn-salung">Detail</a>
					  </div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>