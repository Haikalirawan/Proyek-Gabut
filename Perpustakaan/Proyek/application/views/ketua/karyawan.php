        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-7">
                        <?= $this->session->flashdata('notif'); ?>
                    </div>
                </div>


	<div class="row">
		<div class="col-md-8 pt-3">
			<form action="<?= base_url('Dash_ketua/TambahKaryawan') ?>" method="POST">
				<div class="form-row">
					<div class="form-group col-md-10">
						<label for="nip">NIP : </label>
						<input type="text" name="nip" class="form-control" id="nip">
						<?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<label for="nama">Nama Petugas : </label>
						<input type="text" name="nama" class="form-control" id="nama">
						<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<label for="jenis">Jenis Kelamin : </label>

						<div class="form-check">
							<input class="form-check-input" type="radio" name="jenis" id="lk" value="laki-laki">
							<label class="form-check-label" for="lk">
										Laki laki
							</label>
						</div>

						<div class="form-check">
							<input class="form-check-input" type="radio" name="jenis" id="pr" value="perempuan">
							<label class="form-check-label" for="pr">
									Perempuan
							</label>
						</div>

					<?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>


					<div class="form-group col-md-10">
						<select class="form-control" name="jabatan" id="jabatan">
						<option value="">-- Pilih Jabatan --</option>
										<option value="ketua">ketua</option>
										<option value="karyawan">karyawan</option>
						</select>
						<?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>



					<div class="form-group col-md-10">
						<label for="password">Password : </label>
						<input type="password" name="password" class="form-control" id="password">
						<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
			</div>
		
			<div class="form-group row mt-2">
				<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Tambah Karyawan</button>
				</div>
			</div>
		</form>
		</div>
	</div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
