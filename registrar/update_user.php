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
                $query = "SELECT * FROM cbtp.mother_table where m_id='$id'";
                // echo $query;
                // die();
                $result = mysqli_query($conn,$query) or die(mysqli_error());
                $rows = mysqli_num_rows($result);  
                if ($rows>0){
                        while($rows=mysqli_fetch_assoc($result)){
                            $f_name = $rows['f_name'];
                            $m_name = $rows["m_name"];
                            $l_name=$rows['l_name'];
                            $birthdate =$rows['bithdate'];
                            $image_name = $rows['photo_url'];
                            $blood_type = $rows['blood_type'];
                            $phone_number = $rows['m_phone'];
                            $zone = $rows['zone'];
                            $wereda = $rows['wereda'];
                            $kebele = $rows['kebele'];
                       
                       
        ?>


    <form action='#' method='post' enctype='multipart/form-data' >
    <div class="modal-body">
    
        
    <div class="form-group">
                <label for="name">First name</label>
                <input type="text" value='<?php echo $f_name?>' class="form-control" name='f_name' />
              </div>

              <div class="form-group">
                <label for="name">middle name</label>
                <input type="text" value='<?php echo $m_name?>'  name='m_name' class="form-control" />
              </div>

              <div class="form-group">
                <label for="name">Last name</label>
                <input type="text" value='<?php echo $l_name?>'  name='l_name' class="form-control" />
              </div>
              <div class="form-group">
                  <label for="date-of-birth">Date of Birth</label>
                  <input type="date" value='<?php echo $birthdate; ?>' class="form-control" id="date-of-birth" name="birthdate" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
              </div>
            <!--  <div class="form-group">
                <label for="name">photo</label>
                <td> <input type="file" name="image"> </td>
              </div>  -->

              <div class="form-group">
                <label for="name">blood type</label>
                <select name="blood_type" class="form-control" id="blood_type" default>
                        <option value="A+" <?php  if($blood_type=="A+") echo "selected"; ?> >A+</option>
                        <option value="A-" <?php  if($blood_type=="A-") echo "selected"; ?>>A-</option>
                        <option value="B+" <?php  if($blood_type=="B+") echo "selected"; ?>>B+</option>
                        <option value="B-" <?php  if($blood_type=="B-") echo "selected"; ?>>B-</option>
                        <option value="AB+" <?php  if($blood_type=="AB+") echo "selected"; ?>>AB+</option>
                        <option value="AB-" <?php  if($blood_type=="AB-") echo "selected"; ?>>AB-</option>
                        <option value="O+"  <?php  if($blood_type=="O+") echo "selected"; ?>>O+</option>
                        <option value="O-"  <?php  if($blood_type=="O-") echo "selected"; ?>>O-</option>
                 </select>  
              </div>


              <div class="form-group">
                <label for="name">Phone number</label>
                <input type="text" value='<?php echo $phone_number?>'  name='phone_number' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">zone</label>
                <input type="text" value='<?php echo $zone?>'  name='zone' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">wereda</label>
                <input type="text" value='<?php echo $wereda?>'  name='wereda' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">kebele</label>
                <input type="text" value='<?php echo $kebele; ?>'  name='kebele' class="form-control" />
              </div>

            <?php }}?>

    <div class="modal-footer">
        <label for=""><a href="mother.php">Close</a></label>
        <input type="submit"  class="btn btn-warning" name='updatemother' value="Update">
    </div>

    </div>
    </form>
</div>
</div>
</div>
<!--  Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php 
if(isset($_POST['updatemother'])){
    $f_name = $_POST['f_name'];
    $m_name = $_POST["m_name"];
    $l_name=$_POST['l_name'];
    $birthdate =$_POST['birthdate'];
    $blood_type = $_POST['blood_type'];
    $phone_number = $_POST["phone_number"];
    $wereda = $_POST['wereda'];
    $kebele = $_POST['kebele'];
    
    $query = "UPDATE `cbtp`.`mother_table` SET
              f_name='$f_name', m_name='$m_name',
              l_name='$l_name', bithdate='$birthdate',
              blood_type='$blood_type',
              m_phone='$phone_number',
              zone ='$zone',
              wereda = '$wereda',
              kebele = '$kebele'
              WHERE m_id='$id' ";
    
    $result = mysqli_query($conn,$query)or die(mysqli_error());
    if($result == True){
        $_SESSION["add"]=$f_name." updated successfully";
        #header("Location:".H OMEURL."admin/users.php");
         
     }else{
        
           $_SESSION["add"]=" failed to Update";
         if(isset($_SESSION['add'])){
        echo "<h1 class='error'>". $_SESSION['add']."</h1>";
        unset($_SESSION['add']);

     }
     
}

}
include("./parts/footer.php") ?>