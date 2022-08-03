<!-- Begin Page Content -->
        <div class="container-fluid">

                <!-- <div class="row">
                    <div class="col-lg-7">
                        
                    </div>
                </div> -->


<div class="row">
  <div class="col-md-8 pt-3">
    <form action="<?= base_url('Total_siswa/tambah_data') ?>" method="POST">
      <div class="form-row">
        <div class="form-group col-md-10">
          <label for="kode">Kode siswa : </label>
          <input type="text" name="kode" class="form-control" id="kode">
          <?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>


        <div class="form-group col-md-10">
          <label for="name">Nama siswa : </label>
          <input type="text" name="name" class="form-control" id="name">
          <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
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
            <select class="form-control" name="kelas" id="kelas">
              <option value="">-- Pilih Kelas --</option>
							<option value="X">X</option>
							<option value="XI">XI</option>
							<option value="XII">XII</option>
            </select>
						<?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>


        <div class="form-group col-md-10">
            <select class="form-control" name="jurusan" id="jurusan">
              <option value="">-- Pilih jurusan --</option>
							<?php foreach ($jurusan as $jrs) : ?>
								<option value="<?= $jrs['kd_jurusan']; ?>"><?= $jrs['nama_jurusan']; ?></option>
							<?php endforeach; ?>
            </select>
						<?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
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
