<?php 
require_once 'database/koneksi.php';




if(isset($_POST['cari'])){

    $tglAwal = $_POST['tanggalAwal'];
    $tglAkhir = $_POST['tanggalAkhir'];
    $hari = $_POST['hari'];

    $query = "SELECT * FROM kas WHERE tanggal BETWEEN '$tglAwal' AND '$tglAkhir' AND hari='$hari'";

    
    $shows = mysqli_query($conn, $query);
    
    $no = 1;
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
    <title>Hasil Cari</title>
    <?php require_once 'layouts/_css.php'; ?>
</head>
<body>
    <div class="container py-5">
        <h1>hasil</h1>

        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uang</th>
            </thead>
            <tbody>
                <?php foreach($shows as $s): ?>
                    <tr>
                        <td><?= $no;$no++; ?></td>
                        <td><?= $s['tanggal']; ?></td>
                        <td><?= $s['uang']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-primary mt-3">Kembali</a>
    </div>

<?php require_once 'layouts/_js.php'; ?>

</body>
</html>