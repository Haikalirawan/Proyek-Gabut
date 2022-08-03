        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <small class="mb-4 mt-2 text-gray-800 form-text text-muted"><?= $date ?></small>

                <div class="row">
                    <div class="col-lg-7">
                        <?= $this->session->flashdata('notif'); ?>
                    </div>
                </div>


<div class="row">
  <div class="col-md-8 pt-3">
    <form action="<?= base_url('user/register') ?>" method="POST">
      <div class="form-row">
        <div class="form-group col-md-10">
          <label for="name">Your name : </label>
          <input type="text" name="name" class="form-control" id="name">
          <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group col-md-10">
          <label for="username">Username : </label>
          <input type="text" name="username" class="form-control" id="username">
          <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group col-md-10">
          <label for="password">Your Password : </label>
          <input type="password" name="password" class="form-control" id="password">
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group col-md-10">
          <label for="password2">Repeat Password : </label>
          <input type="password" name="password2" class="form-control" id="password2">
          <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group col-md-10">
            <select class="form-control" name="menu_id" id="menu_id">
                <option value="">-- Select Privilege --</option>
                <?php foreach ($level as $lvl) : ?>
                    <option value="<?= $lvl['id_level'] ?>"><?= $lvl['nama_level'] ?></option>

                <?php endforeach; ?>
            </select>
        </div>



      </div>
      
      <div class="form-group row mt-2">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Create User</button>
        </div>
      </div>
    </form>
  </div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
