<?php 
require_once 'database/koneksi.php';
require_once 'functions/func.php';

session_start();

if(!isset($_SESSION['login'])){
    header("location: login.php");
    exit;
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
    <?php require_once 'layouts/atas.php'; ?>
    
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Laporan kas</h2>
                    <p class="card-description">
                        Laporan kas PT Tidak Indah Perdana
                    </p>
                    <div class="float-right">
                        <a href="kas.php" target="_blank" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp PRINT</a>
                        <br>
                        <br>
                    </div>
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
                                            <a href="ubah.php?id=<?= $data['id']; ?>" class="btn btn-warning badge text-white">Ubah</a>
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
                

    <?php require_once 'layouts/bawah.php'; ?>
    <?php require_once 'layouts/_js.php'; ?>
</body>
</html>