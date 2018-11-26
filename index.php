<?php
session_start();

if(!isset($_SESSION["login"]))
{
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}
    require 'functions.php';
    $mahasiswa=query("SELECT * FROM mahasiswa");

    if(isset($_POST["cari"]))
    {
        $mahasiswa=cari($_POST["keyword"]);
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
            <h1><center>Daftar Mahasiswa</h1>
            <div class="container" align="center">
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="tambah_data.php">Tambah Data</a></li>
            <li><a href="registrasi.php">Register</a></li>
            <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        </nav>
    </body>
        <form action="" method="post"align="center">
            <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name=cari>cari</button>
        </form>
        <br>
        <table class="table" border="1" cellpadding="10" cellspacing="0" align="center">
        <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1 ?>
        <?php foreach($mahasiswa as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Nim"]; ?></td>
            <td><?= $row["Email"]; ?></td>
            <td><?= $row["Jurusan"]; ?></td>
            <td><img src="Gambar/<?php echo $row["Gambar"]; ?>" alt="" scrset="" width="100" height="100"></td>
            <td>
                <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                <a href="hapus.php?id=<?php echo $row["id"]; ?>"onclick="return confirm('Apakah data ini akan dihapus')">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
        <?php endforeach;?>
        </table>        
    </body>
</html>