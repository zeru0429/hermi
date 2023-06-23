<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <script src="script.min.js"></script>

    <link rel="stylesheet" href="style.min.css" />
    <link rel="stylesheet" href="resources/css/style.css" />
    <link rel="stylesheet" href="vendors/font-aweome/css/all.css" />
    <title>Admin UI</title>
  </head>
  <body>
    <!-- NAVIGATION-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
      <div class="container">
        <a href="index.html" class="navbar-brand">Infant Immunization</a>
        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarNav"
        ></button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="./admin/login.php" class="nav-link">
                <i class="fa fa-user-times"> Login</i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--HEADER -->
    <header id="main-header" class="py-2 bg-primary text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1><i class="fa fa-gear">Wellcome Vaccination</i></h1>
          </div>
        </div>
      </div>
    </header>

<div class="menu">
    <div class="wrapper">
        <h1 class='sucess'>Infant immunization</h1>
    </div>
</div>

<div class="main">
    <div class="wrapper">

    <form action="#" method="post">
        <table class="halfwidth">
            <tr>
                <td>username</td>
                <td> <input type="text" name="username" placeholder="username" > </td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password" placeholder="password"  ></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="login" value="login" class="btn-sec"></td>
            </tr>
        </table>
        </form>

    </div>
</div>


<div class="clear-fixt">
    <div>
    </div>
    
    </div> 






<?php
include('../config/constant.php');

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password =md5($_POST['password']);
    $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    
    if ($rows==1){
            $_SESSION["login"]=$id."login successfully";
            $_SESSION["username"]=$username;
            header("Location:".HOMEURL."admin/index.php");
        }
    else{
            $_SESSION["login"]=" fail to login";
            if(isset($_SESSION['login'])){
               echo "<h1 class='error'>". $_SESSION['login']."</h1>";
               unset($_SESSION['login']);
            }   
    }
    
    

    


    }


include("./parts/footer.php")
?>
