  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
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
          <a href="#" class="d-block">Sales Report</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <div class="sidebar-collapse">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            <?php
              $is_dashboard = 0;
              foreach ($data['user_dashboard'] as $row):
                $is_dashboard = $row['dashboard'];
              endforeach;
              

              if ($is_dashboard == 1) 
              {
                echo '<li class="nav-item">';
                  echo '<a href="'.base_url.'/home" class="nav-link">';
                    echo '<i class="nav-icon fas fa-tachometer-alt"></i>';
                    echo '<p>';
                      echo 'Dashboard';
                    echo '</p>';
                  echo '</a>';
                echo '</li>';
              }
              else
              {
                echo '<li class="nav-item">';
                  echo '<a href="'.base_url.'/home" class="nav-link">';
                    echo '<i class="nav-icon fas fa-home"></i>';
                    echo '<p>';
                      echo 'Home';
                    echo '</p>';
                  echo '</a>';
                echo '</li>';
              }
            ?>

            <!-- <li class="nav-item">
              <a href="<?= base_url; ?>/home" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li> -->

            <?php foreach ($data['user_menu'] as $row) :?>
              <!-- <li class="nav-item has-treeview <?php if(isset($menu) and $menu == $row['menu']) {echo "menu-open";} ;?>"> -->
              <li class="nav-item has-treeview">
                <a class="nav-link" href="#">
                  <i class="nav-icon <?= $row['menu_icon']; ?>"></i>
                  <p>
                    <?= $row['menu']; ?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>

                  <ul class="nav nav-treeview">
                  <?php foreach ($data['menu_access'] as $row2) :?>
                    <?php if ($row['menu_id'] === $row2['menu_id']) { ?>
                      <!-- <li class="nav-item <?php if(isset($sub_menu) and $sub_menu == $row2['sub_menu']) {echo "active";} ;?>"> -->
                      <li class="nav-item">
                        <a href="<?= base_url; ?><?= $row2['url']; ?>" class="nav-link">
                          <i class="nav-icon fas fa-genderless"></i>
                          <p>
                            <?= $row2['sub_menu']; ?>
                          </p>
                        </a>
                      </li>

                    <?php } ?>
                  <?php endforeach ; ?>
                  </ul>
                  
              </li>

            <?php endforeach ; ?>

            <li class="nav-header">Extra</li>
            <li class="nav-item">
              <a href="<?= base_url; ?>/about" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  About Us
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
  