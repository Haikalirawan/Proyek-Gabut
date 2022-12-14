    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Administrator') ?>">
        <div class="sidebar-brand-icon rotate-n-10">
            <i class="fas fa-utensils"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Osteria Francescana</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->

        <?php foreach ($queryMenu as $m) : ?>
        <div class="sidebar-heading">
          <?= $m['menu']; ?>
        </div>

      <?php 
					$menuId = $m['id'];
					$querySubMenu = "SELECT * FROM tbl_sub_menu WHERE id_menu = $menuId AND is_active = 1 ";

					$subMenu = $this->db->query($querySubMenu)->result_array();
					?>

      <?php foreach ($subMenu as $sm) : ?>
      	<!-- Nav Item - all -->
				<?php if ($sm['title'] == $title) : ?>
				<li class="nav-item active">
				<?php else : ?>
				<li class="nav-item">
				<?php endif; ?>
        	<a class="nav-link pb-0" href="<?= base_url() . $sm['url'] ?>">
          <i class="<?= $sm['icon']; ?>"></i>
          <span><?= $sm['title']; ?></span></a>
      </li>
      <?php endforeach; ?> 
      <!-- Divider -->
      <hr class="sidebar-divider mt-3">
          <?php endforeach; ?>

          <!-- Nav Item - Logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
