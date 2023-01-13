<?php 
require_once 'database/koneksi.php';

session_start();

if(!isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}

function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}


$query = "SELECT * FROM kas ORDER BY tanggal DESC";
$dataKas = mysqli_query($conn, $query);


$no = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <?php require_once 'layouts/_css.php'; ?>
</head>
<body>
<!-- 
    <div class="container mt-2 py-5 position-relative">

        
    </div> -->

    <?php require_once 'layouts/_navbar.php'; ?>
    
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
              Light
            </div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
              Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles primary"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default border"></div>
            </div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="images/faces/face29.png" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                  Thomas Setiawan
                </p>
                <p class="sidebar-designation">
                  Welcome
                </p>
              </div>
            </div>
            <p class="sidebar-menu-title">Dash menu</p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="typcn typcn-th-small-outline menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          

      </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">Thomas Setiawan</h3>
              </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="container mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Laporan kas</h2>
                                <p class="card-description">
                                    Laporan kas PT Tidak Indah Perdana
                                </p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>No</th>
                                            <th>Hari</th>
                                            <th>Uang</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($dataKas as $data) : ?>
                                                <tr>
                                                    <td><?= $no;$no++ ?></td>
                                                    <td><?= $data['hari'] ?></td>
                                                    <td><?= rupiah($data['uang']) ?></td>
                                                    <td><?= $data['tanggal'] ?></td>
                                                    <td>
                                                        <a href="ubah.php?id=<?= $data['id']; ?>" class="btn btn-warning badge">Ubah</a>
                                                        <a href="proses.php?id=<?= $data['id']; ?>" class="btn btn-danger badge" onclick="return confirm('yakin ingin menghapus ?')">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer bg-white">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">thohoamp.co.id</a> 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <a href="https://www.bootstrapdash.com/" target="_blank">Skandakra </a>SMK 2 KARANGANYAR</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    

    <?php require_once 'layouts/_js.php'; ?>
</body>
</html>