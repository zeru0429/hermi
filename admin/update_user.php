<?php include("./parts/header.php");
$id = $_GET['id'];

?>

 <!--USER MODAL-->

<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header bg-warning text-white">
        <h5 class="modal-title">Update User</h5>
        <button class="close" data-dismiss="modal">
        <span>&times;</span>
        </button>
    </div>
    <?php
        if(isset($_SESSION['add'])){
          echo "<h1 class='error'>". $_SESSION['add']."</h1>";
          unset($_SESSION['add']);}
   
         ?>

        <?php
                $query = "SELECT * FROM cbtp.users where user_id='$id'";
                // echo $query;
                // die();
                $result = mysqli_query($conn,$query) or die(mysqli_error());
                $rows = mysqli_num_rows($result);  
                if ($rows>0){
                        while($rows=mysqli_fetch_assoc($result)){
                        $username = $rows['username'];
                        $rol = $rows['role'];
                        $f_name = $rows['f_name'];
                        $m_name = $rows["m_name"];
                        $l_name=$rows['l_name'];
                        $phone_number = $rows["phone_number"];
                        $email = $rows['email']; 
                       
        ?>


    <form action='#' method='post' enctype='multipart/form-data' >
    <div class="modal-body">
    
        <div class="form-group">
            <label for="name">First name</label>
            <input type="text" class="form-control" name='f_name' value='<?php echo $f_name ?>' />
        </div>

        <div class="form-group">
            <label for="name">middle name</label>
            <input type="text"  name='m_name' value='<?php echo $m_name ?>' class="form-control" />
        </div>

        <div class="form-group">
            <label for="name">Last name</label>
            <input type="text" value='<?php echo $l_name ?>' name='l_name' class="form-control" />
        </div>

        <div class="form-group">
            <label for="name">username</label>
            <input type="text" value='<?php echo $username ?>'  name='username' class="form-control" />
        </div>
        <div class="form-group">
            <label for="name">role</label>
            <input type="text" value='<?php echo $rol?>' name='role' class="form-control" />
        </div>

        <div class="form-group">
            <label for="name">Phone number</label>
            <input type="text" value='<?php echo $phone_number?>'  name='phone_number' class="form-control" />
        </div>

        <div class="form-group">
            <label for="name">photo</label>
            <td> <input type="file" name="image"> </td>
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" value='<?php echo $email ?>' name='email' class="form-control" />
        </div>

            <?php }}?>

    <div class="modal-footer">
        <label for=""><a href="users.php">Close</a></label>
        <input type="submit"  class="btn btn-warning" name='updateuser' value="Update">
    </div>

    </div>
    </form>
</div>
</div>
</div>
<!--  Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php 
if(isset($_POST['updateuser'])){
    $username = $_POST['username'];
    $role = $_POST['role'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST["m_name"];
    $l_name=$_POST['l_name'];
    $phone_number = $_POST["phone_number"];
    $email = $_POST['email'];
    if(!isset($_FILES['image']['name'])){
        $image_name = "";
    }
    else{
        $image_name = $_FILES['image']['name']; 
        $image_source = $_FILES['image']['tmp_name'];
        $image_destination = "../images/users/".$image_name;
        $uplode = move_uploaded_file($image_source,$image_destination);
        if($uplode==FALSE){
            $_SESSION["add"]="faile to upload image";
            #header("Location:".HOMEURL."/admin/users.php");
            die();
        }
     
    }

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
include("./parts/footer.php") ?>