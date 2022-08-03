<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row">
		<div class="col-md-8 pt-3">
			<form action="<?= base_url('Total_buku/tambah_buku') ?>" method="POST">
				<div class="form-row">

					<div class="form-group col-md-10">
						<label for="kode">Kode buku : </label>
						<input type="text" name="kode" class="form-control" id="kode">
						<?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<label for="judul">Judul buku : </label>
						<input type="text" name="judul" class="form-control" id="judul">
						<?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<select class="form-control" name="penerbit" id="penerbit">
						<option value="">-- Pilih penerbit --</option>
							<?php foreach ($penerbit as $pnb) : ?>
								<option value="<?= $pnb['kd_penerbit']; ?>"><?= $pnb['nama_penerbit']; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<label for="tahun">Tahun terbit : </label>
						<input type="date" name="tahun" class="form-control" id="tahun">
						<?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<select class="form-control" name="kategori" id="kategori">
						<option value="">-- Pilih kategori --</option>
							<?php foreach ($kategori as $ktg) : ?>
								<option value="<?= $ktg['kd_kategori']; ?>"><?= $ktg['nama_kategori']; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>

					<div class="form-group col-md-10">
						<select class="form-control" name="rak" id="rak">
						<option value="">-- Pilih rak --</option>
							<?php foreach ($rak as $rk) : ?>
								<option value="<?= $rk['kd_rak']; ?>"><?= $rk['nama_rak']; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('rak', '<small class="text-danger pl-3">', '</small>'); ?>
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
