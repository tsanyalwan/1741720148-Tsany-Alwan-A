<?php
    require 'functions.php';

       if(isset($_POST['register']))
       {
           if(registrasi($_POST)>0)
           {
               echo "
                    <style>
                        alert('user berhasil ditambahkan');
                    </style>
               ";
           }else{
               echo mysqli_error($conn);
           }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Form Registrasi</title>
    <style>
        label {
            display:block;
        }
    </style>
</head>
<body>
<h1 align="center">Halaman Registrasi</h1>
    <hr>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="tambah_data.php">Tambah Data</a></li>
        <li><a href="registrasi.php">Registrasi</a></li>
        <li><a href="login.php">Logout</a></li>
        </ul>
    </div>
    </nav>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
            <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username :</label>
                <div class="col-sm-8">
                    <input type="text" name="username" id="username" required class="form-control"></div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password :</label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password" required class="form-control"></div>
                </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="password2">Konfirmasi Password :</label>
                <div class="col-sm-8">
                    <input type="password" name="password2" id="password2" required class="form-control" ></div>
                </div>
                <div class="col-sm-8">
                <center><button type="submit" name="register" class="btn btn-primary">Registrasi</button></div>
                </div>
            </li>
        </ul>
    </form>
</body>
</html>