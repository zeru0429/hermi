<?php include("./parts/header.php");

// find id
$id = $_GET['id'];
// delete from db
$query = "DELETE FROM `cbtp`.`users` WHERE user_id ='$id'";
$result = mysqli_query($conn,$query)or die(mysqli_error());
if($result == True){
    $_SESSION["add"]=$id." deleted successfully";
     header("Location:".HOMEURL."admin/users.php");
     
 }else{
     $_SESSION["add"]=" failed to delete";
     if(isset($_SESSION['add'])){
    echo "<h1 class='error'>". $_SESSION['add']."</h1>";
    unset($_SESSION['add']);
}
 }
 
// redirect to admin page by showing 

include("./parts/footer.php")
?>