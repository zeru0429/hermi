<?php include("./parts/header.php") ?>
    <!----------  Main section ----------->
    <div class="main">
    <div class="wrapper">
    <h1>Admin Manage</h1 >

    <br>
    
    <?php 
    if(isset($_SESSION['add'])){
        echo "<h2 class= 'success'>". $_SESSION['add']."</h2>";
        unset($_SESSION['add']);
        
    }
    $usr = $_GET['usr'];
    ?>
    <br>
    <br>
    <a href="new-admin.php" class="btn-primary">Add Admin</a>
    <br> <br>
    <table class="fullwidth">
        <tr>
            <th>Id</th>
            <th>Full name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        
        
        <?php
        $query = "SELECT * FROM users where username='$usr'";
        $result = mysqli_query($conn,$query) or die(mysqli_error());;

        if($result==TRUE){ // check if query is successfully excuted
            $rows = mysqli_num_rows($result);

            if ($rows>0){// check the numbers of data in db
                while($rows=mysqli_fetch_assoc($result)){
                    $id=$rows['user_id'];
                     $username = $rows['username'];
                     $rol = $row['role'];
                     $f_name = $rows['f_name'];
                     $m_name = $rows["m_name"];
                     $l_name=$rows['l_name'];
                     $phone_number = $rows["phone_number"];
                     $email = $row['email'];
                 ?>
                    <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $username?></td>
                    <td><?php echo $rol?></td>
                    <td><?php echo $f_name ?></td>
                    <td><?php echo $m_name ?></td>
                    <td><?php echo $l_name?></td>
                    <td><?php echo $phone_number?></td>
                    <td><?php echo $email?></td>
                    
                    <td>
                       <a href="update_admin.php?id=<?php echo $id;?>" class='btn-sec'>Update Admin</a>
                       <a href="change_password.php?id=<?php echo $id;?>" class='btn-sec'>Change Password</a>  
                       <a href="delete_admin.php?id=<?php echo $id;?>" class='btn-dang'>Delete Admin</a> 
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








<div class="clear-fixt"></div>
    </div>
    
    </div> 


    <!----X-----  Main section -----X----->

    


<?php  include("./parts/footer.php") ?>