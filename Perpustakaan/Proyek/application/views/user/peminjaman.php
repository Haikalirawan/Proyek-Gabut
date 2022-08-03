<!-- Begin Page Content -->
<div class="container-fluid">

<!-- <div class="row">
	<div class="col-lg-7">
		
	</div>
</div> -->


	<div class="row">
		<div class="col-md-8 pt-3">
			<form action="<?= base_url('Peminjaman/tambah_peminjaman') ?>" method="POST">
				<div class="form-row">
					
					
					<div class="form-group col-md-10">
						<label for="kode">Kode peminjaman: </label>
						<input type="text" name="kode" class="form-control" id="kode">
						<?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<label for="tanggal">Tanggal pinjam: </label>
						<input type="date" name="tanggal" class="form-control" id="tanggal">
						<?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<select class="form-control" name="buku" id="buku">
						<option value="">-- Pilih buku --</option>
							<?php foreach ($buku as $bk) : ?>
								<option value="<?= $bk['kd_buku']; ?>"><?= $bk['judul_buku']; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('buku', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<label for="kelas">Kelas: </label>
						<input type="text" name="kelas" class="form-control" id="kelas">
						<?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<select class="form-control" name="siswa" id="siswa">
						<option value="">-- Pilih siswa --</option>
							<?php foreach ($siswa as $sw) : ?>
								<option value="<?= $sw['kd_siswa']; ?>"><?= $sw['nama_siswa']; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('siswa', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					
				</div>

					<div class="form-group row mt-2">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
