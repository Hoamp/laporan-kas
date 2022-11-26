<?php 
require_once 'database/koneksi.php';


function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}


if(isset($_POST['tambahKas'])){
    $hari = $_POST['hari'];
    $uang = $_POST['uang'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO kas VALUES(
            '',
            '$hari',
            '$uang',
            '$tanggal'
    )";
    mysqli_query($conn, $query);
    header("location: index.php");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM kas WHERE id='$id'";
    mysqli_query($conn, $query);

    header("location: index.php");
}

if(isset($_POST['ubahKas'])){
    $id = $_POST['id'];
    $hari = $_POST['hari'];
    $uang = $_POST['uang'];
    $tanggal = $_POST['tanggal'];

    $query = "UPDATE kas SET
            hari = '$hari',
            uang = '$uang',
            tanggal = '$tanggal'
        WHERE id='$id'
    ";
    mysqli_query($conn, $query);
    header("location: index.php");
    
}

if(isset($_POST['register'])){
    function registrasi($data){
        global $conn;
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn,$data['password']);
        $password2 = mysqli_real_escape_string($conn, $data['password2']);

        $hasil = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
        
        if(mysqli_fetch_assoc($hasil)){
            echo "<script>
                alert('username sudah terdaftar');
            </script>";
            return false;
        }
        
        
        if($password !== $password2){
            echo "<script>
                alert('konfirmasi password salah');
            </script>";
            return false;
        } 

        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user VALUES(
                    '',
                    '$username',
                    '$password'    
        )";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    
    if(registrasi($_POST) > 0){
        echo "<script>
            alert('user baru berhasil ditambahkan');
        </script>";
        header("location: login.php");
    } else {
        echo mysqli_error($conn);
    }
} 


?>