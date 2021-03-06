<?php
include("connexion.php");
session_start();
$_SESSION['err']='';
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $test = mysqli_query($connect, "SELECT * FROM compte WHERE email='$email' AND passwd = '$password' AND role= 1");
    $row= mysqli_fetch_array($test);
    
    if (mysqli_num_rows($test)>0) {
        $_SESSION['email'] = $email;
        $_SESSION['idadmin'] = $row['role'];
        header("Location:  dashboard/administrateur-home.php");
    } else {
        $_SESSION['err'] = "password or email incorrect";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="../css/index.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../scripts/script.js"></script>

    <link rel="icon" href="../images/icons/baby-car.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- header -->
    <!-- <header> -->
    <nav>
        <ul>
            <li class="logo">Schol<span>ariz</span></li>
            <li class="nav_links"><a href="../../index.html">Accueil</a></li>
            <li class="nav_links"><a href="Notre_Ecole.html">Notre Ecole</a></li>
            <li class="nav_links"><a href="Contactez_Nous.html">Contactez Nous</a></li>
            <li class="nav_links li_btn"><a href="Se_connecter.php">Se connecter</a></li>
            <li class="btn"><a href="#"><i class="fa fa-bars"></i></a></li>
        </ul>
    </nav>
    <!-- </header> -->
    <!-- end header -->
    <!-- main -->
    <!-- end main -->

    <div class="login">
        <h1 class="big-title" style="padding-top: 100px;">Sign in to your</h1>
        <h2 class="sous-title">Justinmind Account</h2>
        <span class="error" id="error" style="color:red; text-align: center;"><?php echo  $_SESSION['err']; ?></span>
        <br>
        <form method="POST" class="form-login shadow" action="Se_connecter.php">
            <label for="#email" class="label-name">your email</label>
            <div class="email">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input name="email" onkeyup="requiredFieldemail()" class="input" placeholder="e.g.jack@scholariz.com" id="email" required>
            </div>
            <label for="#password" class="label-name">your password</label>
            <div class="password">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input class="input" onkeyup="requiredFieldpasswd()" type="password" name="password" placeholder="your password here" id="password" required>
            </div>

            <!-- <a href="#">Forget password ?</a> -->
            <button type="submit" name="submit" class="button">Sign in</a></button>
        </form>

    </div>
    <!-- footer -->
    <footer style="width: 100%; position: fixed; bottom: 0;">
        <div class="footer ">
            <div class="row ">
                <a href="# "><i class="fa fa-facebook "></i></a>
                <a href="# "><i class="fa fa-instagram "></i></a>
                <a href="# "><i class="fa fa-youtube "></i></a>
                <a href="# "><i class="fa fa-twitter "></i></a>
            </div>

            <div class="row ">
                <ul>
                    <li><a href="# ">Contact us</a></li>
                    <li><a href="# ">Our Services</a></li>
                    <li><a href="# ">Privacy Policy</a></li>
                    <li><a href="# ">Terms & Conditions</a></li>
                </ul>
            </div>

            <div class="row ">
                Copyright © 2021 Scholariz - All rights reserved
            </div>
        </div>
    </footer>

    <!-- end footer -->
</body>

</html>