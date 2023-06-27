<?php include("./parts/header.php");?>

<div id="addUserModal" class="">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title">Add new vaccine</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      
      <form action='#' method='post' enctype='multipart/form-data'>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">vaccine name</label>
            <input type="text" class="form-control" name='v_name' />
          </div>
          <div class="form-group">
            <label for="name">description </label>
            <textarea name='description' class="form-control" ></textarea>
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-warning" name='addvaccine' value="submit">
          </div>
        </div>
        </form>





<?php


if(isset($_POST['addvaccine'])){
    $v_name = $_POST['v_name'];
    $description= $_POST['description'];
    $query="INSERT INTO vaccination_description (v_name, description)
    VALUES ('$v_name','$description')";
    $result = mysqli_query($conn,$query)or die(mysqli_error());
 
    if($result == True){
       $_SESSION["add"]=$v_name." sucessfully added";
        header("Location:".HOMEURL."admin/categories.php");
        
    }else{
        $_SESSION["add"]=$username." failed to added";
    }





}


include("./parts/footer.php");?>