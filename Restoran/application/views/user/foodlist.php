        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 text-gray-800"><?= $title; ?></h1>
                <a href="<?= base_url('user/addfoodlist'); ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>&nbsp;&nbsp;Add new food</a>
            </div>
                <small class="mb-4 mt-2 text-gray-800 form-text text-muted"><?= $date ?></small>


                <div class="row">
                    <div class="col-lg-7">
                        <?= $this->session->flashdata('notif'); ?>
                    </div>
                </div>

            <div class="row">
            <?php foreach ($makanan as $mkn) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url('assets/images/img_food/') . $mkn['img_food']; ?>" class="card-img-top" height="246" width="191" alt="Our food">
                        <div class="card-body">
                            <h5 class="card-title"><b><?= $mkn['nama_masakan'] ?></b></h5>
                            <p class="card-text">Rp. <?= $mkn['harga'] ?>-,</p>
                            <p class="card-text">Food : 
                                <small class="text-muted"><?= $mkn['status_masakan'] ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
