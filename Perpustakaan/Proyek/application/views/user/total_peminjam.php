        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Total Siswa -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
					<a href="<?= base_url('Total_siswa') ?>" style="text-decoration: none">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Siswa</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					</a>
                </div>
              </div>
            </div>

						<!-- Total Buku -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
					<a href="<?= base_url('Total_buku') ?>" style="text-decoration: none">
                		<div class="row no-gutters align-items-center">
							<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Buku</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-book fa-2x text-gray-300"></i>
						</div>
						</div>
					</a>
                </div>
              </div>
            </div>


            <!-- Total Peminjaman -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2  bg-info">
                <div class="card-body">
								<a href="<?= base_url('Peminjaman') ?>" style="text-decoration: none">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
												<div class="text-xs font-weight-bold text-light text-uppercase 	mb-1">Peminjaman</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">Buku</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
											</div>
										</div>
									</a>
                </div>
              </div>
            </div>

            <!-- Pengembalian -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
					<a href="<?= base_url('Pengembalian') ?>" style="text-decoration: none">
                  <div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengembalian</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">Buku</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-copy fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</a>
              </div>
            </div>
          </div>


<!-- Content Row -->

<div class="row">

<!-- Pie Chart -->
<div class="col-xl-12 col-lg-12 mt-5">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user text-primary-300"></i>&nbsp;&nbsp;Total peminjam</h6>
		<div class="dropdown no-arrow">
			<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
			</a>
		</div>
	</div>



		<!-- Card Body -->
		<div class="card-body">
			<div class="ml-4 text-left small">
				<span class="mr-2">
					<i class="fas fa-circle text-success"></i>&nbsp; Total peminjam : 250 Data
				</span>
			</div>

		<div class="text-right mt-3 mr-4 mb-2">
			<form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari peminjam..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
            </div>
				</form>
			</div>



				<?= $this->session->flashdata('notif'); ?>

				<div class="row pt-3 pb-2">
					<div class="col">
						<table class="col-md-12 table table-hover">
							<thead class="thead-dark">
								<tr>
									<th scope="col">No</th>
									<th scope="col">Kode peminjam</th>
									<th scope="col">Tanggal peminjam</th>
									<th scope="col">Judul buku</th>
									<th scope="col">Kelas</th>
									<th scope="col">Nama peminjam</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Mark</td>
									<td>Otto</td>
									<td>@mdo</td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>@fat</td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td colspan="2">Larry the Bird</td>
									<td>@twitter</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="ml-5 mt-4">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
					</nav>
				</div>

			</div>
		</div>
	</div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
