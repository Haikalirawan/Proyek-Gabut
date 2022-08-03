        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
          </div>
          <small class="mb-4 mt-2 text-gray-800 form-text text-muted"><?= $date ?></small>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menuName', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('notif'); ?>
            
            <!-- Button trigger modal -->
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#menuModal">
                Add new Menu
            </a>

            <!-- Table -->
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($nameMenu as $nm) : ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $nm['menu'] ?></td>
                        <td>
                            <a href="menu/updateMenu/<?= $nm['id'] ?>" class="badge badge-success">Update</a>
                            <a href="#" class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>







    <!-- Modal Add Menu-->
    <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="menuModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu'); ?>"  method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="menu">Menu Name</label>
                            <input type="text" class="form-control" name="menuName" id="menu">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
