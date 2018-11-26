<?php
    require 'functions.php';

    session_start();

    if(isset($_SESSION["login"]))
    {
        header("Location:index.php");
        exit;
    }

    if(isset($_POST['submit']))
    {
        //     //cek isi dari post menggunakan vardump
            // var_dump($_POST);
            // var_dump($_FILES);
            // die();

        if(tambah($_POST)>0)
        {
            echo "
            <script>
                alert('Data Berhasil Disimpan');
                document.location.href='index.php';
            </script>
            ";
            var_dump($_POST);
            var_dump($_FILES);
            die();
        }else{
            echo "
            <script>
                alert('Data Gagal Disimpan');
                document.location.href='tambah_data.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1 align="center">Tambah Data Mahasiswa</h1>
<hr>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="tambah_data.php">Tambah Data</a></li>
        <li><a href="registrasi.php">Registrasi</a></li>
        <li><a href="logput.php">Logout</a></li>
        </ul>
    </div>
    </nav>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label class="control-label col-sm-2" for="Nama">Nama :</label>
                <div class="col-sm-8">
                    <input type="text" name="Nama" id="Nama" required class="form-control"></div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="Nim">Nim :</label>
                <div class="col-sm-8">
                    <input type="text" name="Nim" id="Nim" required class="form-control"></div>
                </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="Email">Email :</label>
                <div class="col-sm-8">
                    <input type="text" name="Email" id="Email" required class="form-control"></div>
                </div>
                <div class="form-group">
            <label class="control-label col-sm-2" for="Jurusan">Jurusan :</label>
                <div class="col-sm-8">
                    <input type="text" name="Jurusan" id="Jurusan" required class="form-control"></div>
                </div>
                <div class="form-group">
            <label class="control-label col-sm-2" for="Gambar">Gambar :</label>
                <div class="col-sm-8">
                    <input type="file" name="Gambar" id="Gambar" required class="form-control"></div>
                </div>
            <label class="control-label col-sm-2" for="Gambar"></label>
                <div class="col-sm-8" align="center">
                <button type="submit" name="submit" class="btn btn-primary">Tambah</button></div>
                </div>
</form>
</body>
</html>