<?php 
require_once 'database/koneksi.php';

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

    <div class="container mt-2 py-5 position-relative">

        <h1 class="text-center my-4">Laporan Kas Koperasi Tidak Indah Perdana</h1>
    
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Kas</a>

       

        <table class="table table-hover">
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
                        <td><?= $data['uang'] ?></td>
                        <td><?= $data['tanggal'] ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $data['id']; ?>" class="btn btn-warning badge">Ubah</a>
                            <a href="proses.php?id=<?= $data['id']; ?>" class="btn btn-danger badge" onclick="return confirm('yakin ingin menghapus ?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        
        <a href="cari.php" class="btn btn-primary mt-2">Cari Laporan Kas</a><br>
        <a href="logout.php" class="btn btn-danger mt-4">Logout</a>
    </div>


    <?php require_once 'layouts/_js.php'; ?>
</body>
</html>