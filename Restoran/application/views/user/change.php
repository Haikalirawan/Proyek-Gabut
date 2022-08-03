        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
            <small class="mb-4 mt-2 text-gray-800 form-text text-muted"><?= $date ?></small>

<div class="row">
  <div class="col-md-8 pt-3">
    <form action="<?= base_url('user/change') ?>" method="POST">
      <div class="form-row">
        <div class="form-group col-md-10">
          <label for="CurrentPassowrd">Current Password : </label>
          <input type="password" name="currentPassword" class="form-control" id="CurrentPassowrd">
          <?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group col-md-10">
          <label for="newPassword">New Password : </label>
          <input type="password" name="password" class="form-control" id="newPassword">
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group col-md-10">
          <label for="repeatPassword">Repeat Password : </label>
          <input type="password" name="password2" class="form-control" id="repeatPassword">
          <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
      </div>
    </form>
  </div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
