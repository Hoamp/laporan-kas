<?php 
require_once 'database/koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}


if($_GET['id']){
    $id = $_GET['id'];
    $query = "SELECT * FROM kas WHERE id='$id'";
    $dataKas = mysqli_query($conn, $query);
}else{
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Laporan Kas</title>
    <?php require_once 'layouts/_css.php'; ?>
</head>
<body>
    <div class="container py-5">
        <h1>Ubah kas</h1>

        <?php foreach($dataKas as $data): ?>
            <form action="proses.php" method="post">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <div class="mb-3 row">
                    <div class="col-md-4">
                        <label for="hari" class="form-label">Hari : </label>
                        <select class="form-select form-select-lg" name="hari">
                            <option value="Senin" <?php if($data['hari'] == "Senin"){ echo "selected"; } ?>>Senin</option>
                            <option value="Selasa" <?php if($data['hari'] == "Selasa"){ echo "selected"; } ?>>Selasa</option>
                            <option value="Rabu" <?php if($data['hari'] == "Rabu"){ echo "selected"; } ?>>Rabu</option>
                            <option value="Kamis" <?php if($data['hari'] == "Kamis"){ echo "selected"; } ?>>Kamis</option>
                            <option value="Jumat" <?php if($data['hari'] == "Jumat"){ echo "selected"; } ?>>Jumat</option>
                            <option value="Sabtu" <?php if($data['hari'] == "Sabtu"){ echo "selected"; } ?>>Sabtu</option>
                            <option value="Minggu" <?php if($data['hari'] == "Minggu"){ echo "selected"; } ?>>Minggu</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="uang">Uang : </label>
                        <input type="number" name="uang" id="uang" class="form-control mt-2" value="<?= $data['uang']; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="tanggal">Tanggal : </label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control mt-2" value="<?= $data['tanggal']; ?>">
                    </div>
                </div>

                <button class="btn btn-primary mt-2" name="ubahKas" type="submit">ubah</button>
            </form>
        <?php endforeach; ?>
        
        <a href="" class="btn btn-success mt-4">Kembali</a>

    </div>    



    <?php require_once 'layouts/_js.php'; ?>
</body>
</html>