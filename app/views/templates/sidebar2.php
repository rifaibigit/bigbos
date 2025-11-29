  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <span class="brand-text font-weight-light"></span> -->
      <center><img src="<?= base_url; ?>/dist/img/BIG.png" class="img-fluid"></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Sales Report</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <div class="sidebar-collapse">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="<?= base_url; ?>/home" class="nav-link">
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
                  <a href="<?= base_url; ?>/distributor" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Distributor
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/area" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Area
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/channel" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Channel
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/outlet" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Outlet
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/sku" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      SKU
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/user" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      User
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a class="nav-link" href="#">
                <i class="nav-icon fas fa-upload"></i>
                <p>
                  Upload
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url; ?>/sellingin" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling In
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/sellingout" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling Out
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/targetso" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Target
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a class="nav-link" href="#">
                <i class="nav-icon fas fa-dollar-sign"></i>
                <p>
                  Selling In
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingin" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Summary Selling In
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingin_performance" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                    Selling In - Performance
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingin_qty" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling In - Quantity
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingin_OT" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling In - Outlet
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/Sellingin_Dist" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling In - Distributor
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a class="nav-link" href="#">
                <i class="nav-icon fas fa-search-dollar"></i>
                <p>
                  Selling Out
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingout" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Summary Selling Out
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingout_performance" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling Out - Performance
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingout_qty" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling Out - Quantity
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingout_OT" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling Out - Outlet
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingout_performance_salesman" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling Out - Salesman
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/sellingout_distributor" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Selling Out - Distributor
                    </p>
                  </a>
                </li>
              </ul> 
            </li>

            <li class="nav-item has-treeview">
              <a class="nav-link" href="#">
                <i class="nav-icon fa fa-truck"></i>
                <p>
                  Distribution
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/distribution_lord" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Distribution - LORD
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/distribution_jordan" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Distribution - JORDAN
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a class="nav-link" href="#">
                <i class="nav-icon fas fa-hand-holding-usd"></i>
                <p>
                  Contribution
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/contribution_lord" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Contribution - LORD
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/contribution_jordan" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Contribution - JORDAN
                    </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a class="nav-link" href="#">
                <i class="nav-icon fas fa-chart-bar"></i>
                <p>
                  Chart
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/chart" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Chart 1
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/chart2" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Chart 2
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/chart3" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Chart 3
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url; ?>/report/chart4" class="nav-link">
                    <i class="nav-icon fas fa-genderless"></i>
                    <p>
                      Chart 4
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
  