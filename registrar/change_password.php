<?php include("./parts/header.php"); ?>
<form action="#" method="post">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Add User</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="form-group">
                <label for="password">Curent Password</label>
                <input type="password" name='current_ password' class="form-control" />
            </div>
            <div class="form-group">
                <label for="password">new Password</label>
                <input type="password" name='password' class="form-control" />
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name='c_password' class="form-control" />
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-warning" name='submit' value="Submit">
            </div>
        </div>
    </div>
</form>
<?php 

if(isset($_POST['updateuser'])){
    $username = $_POST['username'];
    $role = $_POST['role'];
    
    $query ="UPDATE `cbtp`.`users` SET
             f_name='$f_name', m_name='$m_name', 
             l_name='$l_name', username='$username', 
             phone_number='$phone_number', 
             email='$email', role='$role' where user_id='$id' ";

    $result = mysqli_query($conn,$query)or die(mysqli_error());

    if($result == True){
        $_SESSION["add"]=$username." updated successfully";
        #header("Location:".HOMEURL."admin/users.php");
         
     }else{
        
           $_SESSION["add"]=" failed to Update";
         if(isset($_SESSION['add'])){
        echo "<h1 class='error'>". $_SESSION['add']."</h1>";
        unset($_SESSION['add']);

     }
     
}

}






include("./parts/footer.php"); ?>