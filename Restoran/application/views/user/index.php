        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
                <h1 class="h3 text-gray-800"><?= $title; ?></h1>
                <small class="mb-4 mt-2 text-gray-800 form-text text-muted"><?= $date ?></small>


                <div class="row">
                    <div class="col-lg-7">
                        <?= $this->session->flashdata('notif'); ?>
                    </div>
                </div>

                <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="<?= base_url('assets/images/img_profile/') . $user['image'] ?>" class="card-img" alt="Your profile">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><b><?= $queryLevel['nama_level'] ?></b></h5>
                        <p class="card-text"><?= $user['name_user'] ?></p>
                        <p class="card-text"><small class="text-muted"><?= $queryLevel['nama_level'] ?> Since <?= date('d F Y', $user['date_created']) ?></small></p>
                    </div>
                    </div>
                </div>
                </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
