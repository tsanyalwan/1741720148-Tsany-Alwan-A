<?php
    require 'functions.php';
    session_start();

    if(isset($_SESSION["login"]))
    {
        header("Location:index.php");
        exit;
    }
    
   $id=$_GET["id"];
   //var_dump($id);
   $mhs=query("SELECT * FROM mahasiswa WHERE id=$id")[0];
   //var_dump($mhs[0]["Nama"]);
     
     // cek apakah button submit sudah di tekan atau belum
     if(isset($_POST['submit']))
     {
         if(edit($_POST)>0)
         {
             echo "
             <script>
                 alert('data berhasil diperbaharui');
                 document.location.href='index.php';
             </script>
             ";
     }else{
         echo "
         <script>
             alert('data gagal diperbaharui');
             document.location.href='edit.php';
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
    <h1 align="center">Update Data Mahasiswa</h1>
    <hr>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <li>
            <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
            <input type="hidden" name="GambarLama" value="<?= $mhs["Gambar"] ?>">
        </li>
            <div class="form-group">
            <label class="control-label col-sm-2" for="Nama">Nama :</label>
                <div class="col-sm-8">
                    <input type="text" name="Nama" id="Nama" required class="form-control" value="<?= $mhs["Nama"]; ?>"></div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="Nim">Nim :</label>
                <div class="col-sm-8">
                    <input type="text" name="Nim" id="Nim" required class="form-control" value="<?= $mhs["Nim"]; ?>"></div>
                </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="Email">Email :</label>
                <div class="col-sm-8">
                    <input type="text" name="Email" id="Email" required class="form-control" value="<?= $mhs["Email"]; ?>"></div>
                </div>
                <div class="form-group">
            <label class="control-label col-sm-2" for="Jurusan">Jurusan :</label>
                <div class="col-sm-8">
                    <input type="text" name="Jurusan" id="Jurusan" required class="form-control" value="<?= $mhs["Jurusan"]; ?>"></div>
                </div>
                <div class="form-group">
            <label class="control-label col-sm-2" for="Gambar">Gambar :</label>
                <div class="col-sm-8">
                    <img src="Gambar/<?= $mhs[Gambar];?>" alt="" height="100" width="100"><br>
                    <input type="file" name="Gambar" id="Gambar" required class="form-control" value="<?= $mhs["Gambar"]; ?>"></div>
                </div>
            <label class="control-label col-sm-2" for="Gambar"></label>
                <div class="col-sm-8" align="center">
                <button type="submit" name="submit" class="btn btn-primary">Update</button></div>
                </div>
    </form>
</body>
</html>