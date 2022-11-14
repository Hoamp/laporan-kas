<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <?php require_once 'layouts/_css.php'; ?>
</head>
<body>
<div class="container py-5">
    <h1>Registrasi</h1>

    <form action="proses.php" method="POST" >

        <div class="mb-3" >
            <label  class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label  class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password2">
        </div>
        <button type="submit" class="btn btn-primary" name="register">Register</button>

    </form>
    <a href="login.php" class="btn btn-success mt-2">Sudah ada account?</a>
</div>


    <?php require_once('layouts/_js.php'); ?>
</body>
</html>