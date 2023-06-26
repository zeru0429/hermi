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
                            $f_name = $_POST['f_name'];
                            $m_name = $_POST["m_name"];
                            $l_name=$_POST['l_name'];
                            $birthdate =$_POST['birthdate'];
                            $blood_type = $_POST['blood_type'];
                            $phone_number = $_POST["phone_number"];
                            $password = md5($_POST['password']);
                            $zone = $_POST['zone'];
                            $wereda = $_POST['wereda'];
                            $kebele = $_POST['kebele'];
                       
                       
        ?>


    <form action='#' method='post' enctype='multipart/form-data' >
    <div class="modal-body">
    
        
    <div class="form-group">
                <label for="name">First name</label>
                <input type="text" class="form-control" name='f_name' />
              </div>

              <div class="form-group">
                <label for="name">middle name</label>
                <input type="text"  name='m_name' class="form-control" />
              </div>

              <div class="form-group">
                <label for="name">Last name</label>
                <input type="text"  name='l_name' class="form-control" />
              </div>
              <div class="form-group">
                  <label for="date-of-birth">Date of Birth</label>
                  <input type="text"  class="form-control" id="date-of-birth" name="birthdate" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
              </div>
              <div class="form-group">
                <label for="name">photo</label>
                <td> <input type="file" name="image"> </td>
              </div>  

              <div class="form-group">
                <label for="name">blood type</label>
                <input type="text"  name='blood_type' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">Phone number</label>
                <input type="text"  name='phone_number' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">zone</label>
                <input type="text"  name='zone' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">wereda</label>
                <input type="text"  name='wereda' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">kebele</label>
                <input type="text"  name='kebele' class="form-control" />
              </div>

            <?php }}?>

    <div class="modal-footer">
        <label for=""><a href="mother.php">Close</a></label>
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
    $f_name = $_POST['f_name'];
    $m_name = $_POST["m_name"];
    $l_name=$_POST['l_name'];
    $birthdate =$_POST['birthdate'];
    $blood_type = $_POST['blood_type'];
    $phone_number = $_POST["phone_number"];
    $password = md5($_POST['password']);
    $zone = $_POST['zone'];
    $wereda = $_POST['wereda'];
    $kebele = $_POST['kebele'];

    if(!isset($_FILES['image']['name'])){
        $image_name = "";
    }
    else{
        $image_name = $_FILES['image']['name']; 
        $image_source = $_FILES['image']['tmp_name'];
        $image_destination = "../images/mother/".$image_name;
        $uplode = move_uploaded_file($image_source,$image_destination);
        if($uplode==FALSE){
            $_SESSION["add"]="faile to upload image";
            #header("Location:".HOMEURL."/admin/users.php");
            die();
        }
     
    }

    $query ="UPDATE `cbtp`.`mother_table` SET
             f_name='$f_name', m_name='$m_name', 
             l_name='$l_name', bithdate='$birthdate',
             photo_url='$image_name' 
             blood_type='$blood_type',
             m_phone='$phone_number',
             zone ='$zone',
             wereda = '$wereda'
             kebele = '$kebele'
            m_id='$id' ";

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