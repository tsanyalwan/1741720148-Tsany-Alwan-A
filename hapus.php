<?php
require 'functions.php';

session_start();

if(isset($_SESSION["login"]))
{
    header("Location:index.php");
    exit;
}

$id=$_GET["id"];

if(hapus($id)>0)
{
    echo "
    <script>
        alert('Data Berhasil Dihapus');
        document.location.href='index.php';
    </script>

    ";
}else{
    echo "
    <script>
        alert('Data Gagal Dihapus');
        document.location.href='index.php';
    </script>";
    echo "<br>";
    echo mysqli_error($conn);
}
?>