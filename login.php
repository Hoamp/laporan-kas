<?php 
session_start();

if(isset($_SESSION['login'])){
    header("location: index.php");
    exit;
}

require_once 'database/koneksi.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hasil = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    
    if(mysqli_num_rows($hasil) === 1){
        $row = mysqli_fetch_assoc($hasil);
        if(password_verify($password, $row['password'])){
            $_SESSION['login'] = true;
            
            header("location: index.php");
            exit;
        } 
        header("location: login.php");
        exit;
    }
    
    $error = true;
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require_once 'layouts/_css.php'; ?>
</head>
<body>
    <div class="container py-5">
        <h1>Login</h1>

        <form action="" method="post">

            <?php if(isset($error)): ?>
                <p class="text-danger fst-italic">username / password salah</p>
            <?php endif; ?>

            <div class="mb-3" >
                <label  class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label  class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" class="btn btn-primary" name="login">Login</button><br>
            
            
        </form>
        <a href="registrasi.php" class="btn btn-success mt-2">Belum punya account?</a>
    </div>


    <?php require_once('layouts/_js.php'); ?>
</body>
</html>