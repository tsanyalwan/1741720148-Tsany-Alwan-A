<?php
session_start();

if(isset($_COOKIE['login']))
{
    if(isset($_COOKIE['login']=='true'))
    {
        $_SESSION['login']=true;
    }
}

if(isset($_SESSION["login"]))
{
    header("Location:index.php");
    exit;
}
require 'functions.php';

if(isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $result=mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($result)===1){
        
        $row=mysqli_fetch_assoc($result);
    
        if($password===$row["password"])
        {
            $_SESSION["login"]=true;

            if(iseet($_POST['remember']))
            {
                setcookie('login','true',time()+60);
            }
            header("Location:index.php");
            exit;
        }
    }
    $error=true;
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
    <title>Halaman Login</title>
</head>
<body>
    <h1><center>Halaman Login</h1>
    <hr>
    <?php if(isset($error)):?>
        <p style="color:red;font-style=bold">
        Username dan password salah !</p>
    <?php endif?>

    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
                <div class="col-sm-10">
                    <label class="control-label col-sm-5" for="remember">Remember Me</label>
                    <input type="checkbox" name="remember" id="remember" required></div>
                </div>
            <div class="form-group">
                <div class="col-sm-8">
                <center><button type="submit" name="login" class="btn btn-primary">Login</button></div>
                </div>
    </form>
</body>
</html>