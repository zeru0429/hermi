<?php include("./parts/header.php") ?>

    <!----------  Main section ----------->
    <div class="main">
    <div class="wrapper">
    <h1>Dashbord</h1 >
    
<?php if(isset($_SESSION['login'])){
               echo "<h1 class='success'>". $_SESSION['login']."</h1>";
               unset($_SESSION['login']);
            }  
             ?>
    <div class="catagor text-center">
  <?php  $query = "SELECT * from users";
    $result=mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    ?>
        <h2><?php echo $rows?></h2>
        <br>
        users
    </div>
    
    <div class="catagor text-center">
    <?php  $query = "SELECT * from mother_vaccin";
    $result=mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    ?>
        <h2><?php echo $rows?></h2>
        <br>
        mother_vaccin
    </div>

    <div class="catagor text-center">
    <?php  $query = "SELECT * from mother_table";
    $result=mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    ?>
        <h2><?php echo $rows?></h2>
        <br>
        mother_vaccin
    </div>

    

<div class="clear-fixt"></div>
    </div>
    
    </div>


    <!----X-----  Main section -----X----->

    
    <?php  include("./parts/footer.php") ?>