<?php 
require_once 'database/koneksi.php';
session_start();

if(!isset($_SESSION['login'])){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kas</title>
    <?php require_once 'layouts/_css.php'; ?>
</head>
<body>
    <?php require_once 'layouts/_navbar.php'; ?>
    <?php require_once 'layouts/atas.php'; ?>
    <div class="container py-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Tambah kas</h2>
                <p class="card-description">
                    PT Tidak Indah Perdana
                </p>


                <form action="proses.php" method="post">
                    <div class="mb-3 row">
                        <div class="col">
                            <label for="hari" class="form-label">Hari : </label>
                            <select class="form-select form-select-lg form-control" name="hari">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="uang">Uang : </label>
                            <input type="number" name="uang" id="uang" class="form-control mt-2">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="tanggal">Tanggal : </label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control mt-2">
                        </div>
                    </div>

                    <button class="btn btn-primary mt-2" name="tambahKas" type="submit">Tambah</button>
                    
                </form>
            </div>
        </div>

    </div>    


    <?php require_once 'layouts/bawah.php'; ?>
    <?php require_once 'layouts/_js.php'; ?>
</body>
</html>