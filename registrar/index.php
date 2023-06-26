<?php include("./parts/header.php") ?>
<header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="main">
            <div class="wrapper">
                <h1>Registrar Dashbord</h1 >

            </div>
        </div>
    </div>
</header>

<div class="container">
    
        <div class="catagor text-center">
            <?php  $query = "SELECT * from users";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            users
        </div>

        <div class="catagor text-center">
            <?php  $query = "SELECT * from vaccination_description";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            total vaccination
        </div> 

        <div class="catagor text-center">
            <?php  $query = "SELECT * from post";
            $result=mysqli_query($conn, $query);
            $rows = mysqli_num_rows($result); 
            ?>
            <h2>
            <?php echo $rows?>
            </h2><br>
           total Post
        </div>
 

        <div class="catagor text-center">
            <?php  $query = "SELECT * from mother_table";
            $result=mysqli_query($conn, $query);
            $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?></h2><br>
            total mother
        </div>


        <div class="catagor text-center">
            <?php  $query = "SELECT * from child_table";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            total child
        </div>  


        <div class="catagor text-center">
            <?php  $query = "SELECT * from mother_vaccin";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            total mother vaccin
        </div> 

        <div class="catagor text-center">
            <?php  $query = "SELECT * from child_vaccine";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            total child vaccine
        </div> 

        <div class="catagor text-center">
            <?php  $query = "SELECT * from post_img";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            total post_img
        </div> 
       
    
</div> 

    
    
<?php  include("./parts/footer.php") ?>