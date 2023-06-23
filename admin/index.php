<?php include("./parts/header.php") ?>
<header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="main">
            <div class="wrapper">
                <h1>Dashbord</h1 >

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
            <?php  $query = "SELECT * from post";
            $result=mysqli_query($conn, $query);
            $rows = mysqli_num_rows($result); 
            ?>
            <h2>
            <?php echo $rows?>
            </h2><br>
            Post
        </div>
 

        <div class="catagor text-center">
            <?php  $query = "SELECT * from mother_table";
            $result=mysqli_query($conn, $query);
            $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?></h2><br>
                mother
        </div>


        <div class="catagor text-center">
            <?php  $query = "SELECT * from child_table";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            child
        </div>  


        <div class="catagor text-center">
            <?php  $query = "SELECT * from mother_vaccin";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            mother_vaccin
        </div> 

        <div class="catagor text-center">
            <?php  $query = "SELECT * from child_vaccine";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            child_vaccine
        </div> 

        <div class="catagor text-center">
            <?php  $query = "SELECT * from post_img";
                $result=mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);
            ?>
            <h2><?php echo $rows?>
            </h2><br>
            post_img
        </div> 
    
</div> 

    
    
<?php  include("./parts/footer.php") ?>