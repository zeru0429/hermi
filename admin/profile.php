<?php include("./parts/header.php") ?>
    <!----------  Main section ----------->
    <div class="main contaner center">
        <div class="wrapper">
            <h1>Profile</h1 ><br>
        </div>
    </div>
    
        <?php 
            if(isset($_SESSION['add'])){
                echo "<h2 class= 'success'>". $_SESSION['add']."</h2>";
                unset($_SESSION['add']);
                
            }
            $username = $_GET['username'];
        ?>
    
<br><br>
<div>
    <div>
        <a href="index.php" class="btn-primary">Back to dashbord</a>
        <br> <br>
    </div>
    <div class='pro-table'>
        <table class="fullwidth " >
            <?php
                $query = "SELECT * FROM cbtp.users where username='$username'";
                $result = mysqli_query($conn,$query) or die(mysqli_error());;

                if($result==TRUE){ // check if query is successfully excuted
                    $rows = mysqli_num_rows($result);
                    if ($rows>0){// check the numbers of data in db
                        while($rows=mysqli_fetch_assoc($result)){
                            $id=$rows['user_id'];
                            $username = $rows['username'];
                            $rol = $rows['role'];
                            $f_name = $rows['f_name'];
                            $m_name = $rows["m_name"];
                            $l_name=$rows['l_name'];
                            $phone_number = $rows["phone_number"];
                            $email = $rows['email'];
                            $image_url = $rows['image_url'];
                        ?>
                            <tr>
                                <td style="border: 2px" ><img style="border-radius: 50%" width='200vh'  src="./../images/users/<?php echo $image_url ?>" alt="" srcset=""></td>
                            </tr>

                            <tr>
                                <td><?php echo $username?></td>
                            </tr>
                            <tr>
                                <td><?php echo $rol?></td>
                            </tr>
                            <tr>
                                <td><?php echo $f_name ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $m_name ?></td>
                            </tr>

                            <tr>
                                <td><?php echo $l_name?></td>
                            </tr>
                        
                            <tr>
                                <td><?php echo $phone_number?></td>
                            </tr>
                            <tr>
                                <td><?php echo $email?></td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <a href="update_admin.php?id=<?php echo $id;?>" class='btn-sec'>Update Admin</a>
                                    <a href="change_password.php?id=<?php echo $id;?>" class='btn-sec'>Change Password</a>  
                                </td>
                            </tr>
            <?php 
                    
                        }

                    }
                    else{
                        //no data here// empty database
                    }

                }


            ?>

        </table>
    </div>

    
</div>


<?php  include("./parts/footer.php") ?>