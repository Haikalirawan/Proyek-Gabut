        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
                <h1 class="h3 text-gray-800"><?= $title; ?></h1>
                <small class="mb-4 mt-2 text-gray-800 form-text text-muted"><?= $date ?></small>

    <div class="row ">
        <div class="col-lg-8 pt-4">
        <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="username" name="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" name="username" id="username" placeholder="username" value="<?= $user['username'] ?>" readonly>
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="name" name="name" class="form-control" id="name" value="<?= $user['name_user'] ?>" placeholder="Full Name">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('assets/images/img_profile/') . $user['image'] ?>" alt="Your Profile" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-offset-10 pr-3">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
        <!-- /.container-fluid -->

</div>
        <!-- End of Main Content -->
