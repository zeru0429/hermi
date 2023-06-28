<?php include("./parts/header.php"); ?>

<header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Admin Dashboard</h1>
            </div>
        </div>
    </div>
</header>

<div class="container mt-5">
    <div class="row">
        

       
       
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <?php
                    $query = "SELECT * from mother_table";
                    $result = mysqli_query($conn, $query);
                    $rows = mysqli_num_rows($result);
                    ?>
                    <h2><?php echo $rows ?></h2>
                    <p>Total Mothers</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-4">
            <div class="card text-center">
                <div class="card-body">
                    <?php
                    $query = "SELECT * from child_table";
                    $result = mysqli_query($conn, $query);
                    $rows = mysqli_num_rows($result);
                    ?>
                    <h2><?php echo $rows ?></h2>
                    <p>Total Children</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-4">
            <div class="card text-center">
                <div class="card-body">
                    <?php
                    $query = "SELECT * from mother_vaccin";
                    $result = mysqli_query($conn, $query);
                    $rows = mysqli_num_rows($result);
                    ?>
                    <h2><?php echo $rows ?></h2>
                    <p>Total Mother Vaccinations</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-4">
            <div class="card text-center">
                <div class="card-body">
                    <?php
                    $query = "SELECT * from child_vaccine";
                    $result = mysqli_query($conn, $query);
                    $rows = mysqli_num_rows($result);
                    ?>
                    <h2><?php echo $rows ?></h2>
                    <p>Total Child Vaccinations</p>
                </div>
            </div>
        </div>

      
    </div>
</div>








<?php include('./parts/footer.php');?>