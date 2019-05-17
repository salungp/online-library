<div class="container">

	<div class="link">
		<a href="<?= base_url(); ?>">Home  </a>&raquo;  <a href="<?= base_url('detail/' . $buku['id']); ?>">Detail  </a>&raquo;  <a><?= $buku['judul']; ?></a>
	</div>

	<?= $this->session->flashdata('message'); ?>

	<div class="row">
		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class="content-wrapper">
				<h1 class="text-heading">Judul Buku : <?= $buku['judul']; ?></h1>

				<?php if ($buku['status'] == 1) : ?>

					<div class="badge badge-danger">Dipinjam</div>

				<?php else : ?>

					<div class="badge badge-success">Belum Dipinjam</div>

				<?php endif; ?>

				<h2 class="text-subheading">Karya : <i><?= $buku['pengarang']; ?></i></h2>
				<b class="text">Penerbit :</b>
				<p class="text"><?= $buku['penerbit']; ?></p>

				<b class="text">Deskripsi :</b>
				<p class="text" style="margin-bottom: 10px;"><?= $buku['deskripsi']; ?></p>

				<?php if ($buku['status'] == 1) : ?>

				<?php else : ?>

					<button type="button" class="btn-salung" data-toggle="modal" data-target="#exampleModal">
		  Pinjam
		</button>
				<?php endif; ?>

				<a href="<?= base_url(); ?>" class="btn-pucat">Kembali</a>
			</div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="sidebar">
				<div class="sidebar-header">
					<p class="text">Yang Lainya</p>
				</div>
				<div class="sidebar-content">

					<?php foreach ($semua_buku as $item) : ?>

						<div class="sidebar-item">
							<b class="text"><?= $item['judul']; ?></b>
							<p class="text"><?= substr($item['deskripsi'], 0, 50); ?>...</p>
							<a href="<?= base_url('detail/' . $item['id']); ?>" class="text blue"><i>Detail &raquo;</i></a>
						</div>
					<hr>

					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<p>Max 10 hari</p>
      	<form action="<?= base_url('home/pinjam'); ?> method="post" class="form-pinjam">	
			<input type="hidden" name="buku" value="<?= $buku['judul']; ?>">
			<input type="hidden" name="user" value="<?= $_SESSION['name']; ?>">
			<input type="hidden" name="id" value="<?= $buku['id']; ?>">
			<select name="waktu">
				<option>jam</option>
				<option>hari</option>
			</select>
			<input type="number" name="lama_pinjam" class="form-control">
      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary btn-pinjam">Pinjam</button>
	      </div>
	    </form>
    </div>
  </div>
</div>