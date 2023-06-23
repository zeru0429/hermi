<?php include("./parts/header.php"); 

// find id
$id = $_GET['id'];
// delete from db
$query = "DELETE FROM `cbtp`.`post` WHERE post_id ='$id'";
$result = mysqli_query($conn,$query)or die(mysqli_error());
if($result == True){
    $_SESSION["add"]=$id." deleted successfully";
     header("Location:".HOMEURL."admin/post.php");
     
 }else{
     $_SESSION["add"]=" failed to delete";
     if(isset($_SESSION['add'])){
    echo "<h1 class='error'>". $_SESSION['add']."</h1>";
    unset($_SESSION['add']);
}
 }


include("./parts/footer.php") ?>