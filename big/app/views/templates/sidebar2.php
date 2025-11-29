  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <span class="brand-text font-weight-light"></span> -->
      <center><img src="<?= base_url; ?>/dist/img/B I G merah.png" class="img-fluid"></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <div class="sidebar-collapse">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="<?= base_url; ?>/Admin" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a class="nav-link" href="#">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url; ?>/Sku" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      SKU
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/SkuGroup" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      SKU Group
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/SkuDesc" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      SKU Desc
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/Fridge" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Fridge Unit
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/User" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      User
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Extra</li>
            <li class="nav-item">
              <a href="<?= base_url; ?>/about" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  About Me
                </p>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  