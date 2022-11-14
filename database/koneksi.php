<?php 
$server = "localhost";
$user = "root";
$pass = "";
$db = "koperasi";

// $conn untuk koneksi ke database
$conn = mysqli_connect($server,$user,$pass,$db);

// mengecek koneksi ke db
if(!$conn){
    echo "<script>
        alert('Database tidak dapat terkoneksi');
    </script>";
}

?>