<?php include("../config/constant.php");
      include("logincheck.php");  
     $usr= $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"   content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <script src="script.min.js" deffer></script>
    <link rel="stylesheet" href="../css/style.min.css" />
    <link rel="stylesheet" href="resources/css/style.css" />
    <link rel="stylesheet" href="vendors/font-aweome/css/all.css" />
    <link rel="stylesheet" href="../../css/profile.css">
    <title>Admin UI</title>
  </head>
  <body>
    <!-- NAVIGATION-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
      <div class="container">
        <a href="index.php" class="navbar-brand">Infant Immunization</a>
        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarNav"
        ></button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item px-2">
              <a href="index.php" class="nav-link active">Dashboard</a>
            </li>
            <li class="nav-item px-2">
              <a href="post.php" class="nav-link">Post</a>
            </li>
            <li class="nav-item px-2">
              <a href="categories.php" class="nav-link">Vaccine</a>
            </li>
            <li class="nav-item px-2">
              <a href="users.php" class="nav-link">Users</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown mr-3">
              <a
                href="profile.php?username=<?php echo $usr ?>"
                class="nav-link dropdown-toggle">
                <i class="fa fa-user"><?php echo $usr;?> Profile</i></a>
              <div class="dropdown-menu">
                <a href="profile.php?usr='$id='$usr'" class="dropdown-item">
                  <i class="fa fa-user-circle"> Profile</i>
                </a>
                <a href="settings.php" class="dropdown-item">
                  <i class="fa fa-gear"> Settings</i>
                </a>
              </div>
            </li>
            <li class="nav-item">
              <a href="../logout.php" class="nav-link">
                <i class="fa fa-user-times"> Logout</i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
