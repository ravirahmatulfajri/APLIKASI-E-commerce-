  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          
        </div>
        <?php
          include "../lib/config.php";
          include "../lib/koneksi.php";
          if ($_GET) {
            $page = $_GET['pages'];
            }
            $username = $_SESSION['username'];
            $query = mysqli_query($koneksi, "SELECT * FROM admins WHERE username='$username'");
            $user = mysqli_fetch_array($query);
          
          
          ?>
        <div class="info">
          <a href="#" class="d-block"><?= $user['nama_lengkap'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="main.php?pages=home" class = 'nav-link <?php if ($page == 'home') echo " active"; ?> '>
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home 
              </p>
            </a>            
          </li>
          <li class="nav-header">MAIN</li>
          <li class="nav-item">
            <a href="main.php?pages=order" class = 'nav-link <?php if ($page == 'order') echo " active"; ?> '>
              <i class="nav-icon fas fa-book"></i>
              <p>
                Order
              </p>
            </a>            
          </li>
          <li class="nav-header">MANAGE</li>          
          <li class ='nav-item <?php if ($page == 'user') echo " menu-open"; ?> '>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Akun
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"> 
                <a href="main.php?pages=user&act=" class = 'nav-link <?php if ($page == 'user') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>          
            </ul>
          </li> 
          <li class ='nav-item <?php if ($page == 'profil' OR $page == 'cara_beli') echo " menu-open"; ?> '>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Site
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?pages=edit_profil" class = 'nav-link <?php if ($page == 'profil') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil Toko</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?pages=cara_beli" class = 'nav-link <?php if ($page == 'cara_beli') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cara Beli</p>
                </a>
              </li>          
            </ul>
          </li>
          <li class ='nav-item <?php if ($page == 'kategori_barang' OR $page == 'nama_barang') echo " menu-open"; ?> '>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="main.php?pages=kategori_barang&act=" class = 'nav-link <?php if ($page == 'kategori_barang') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="main.php?pages=nama_barang" class = 'nav-link <?php if ($page == 'nama_barang') echo " active"; ?> '>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nama</p>
                </a>
              </li>              
            </ul>
          </li> 
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>