<?php include("./parts/header.php"); 

// find id
$id = $_GET['id'];
// delete from db
$query = "SELECT * FROM `cbtp`.`post_img` WHERE post_id='$id' ";
$result = mysqli_query($conn,$query)or die(mysqli_error());
$rows = mysqli_num_rows($result);
while($rows=mysqli_fetch_assoc($result)){
  $photo_url = $rows['img_url'];
}

$query1 = "DELETE FROM `cbtp`.`post_img` WHERE post_id ='$id'";
$result1 = mysqli_query($conn,$query1)or die(mysqli_error()); 
if($result1 == True){

   $query = "DELETE FROM `cbtp`.`post` WHERE post_id ='$id'";
   $result = mysqli_query($conn,$query)or die(mysqli_error());
   
   if($result == True){  
   $sourceDirectory = '../images/posts/';
   $destinationDirectory = '../backup/image/posts/';
   $imageName =$photo_url;

   $sourcePath = $sourceDirectory . $imageName;
   $destinationPath = $destinationDirectory . $imageName;
   $moveBackup = rename($sourcePath, $destinationPath);

   if ($moveBackup) {
    echo 'Image moved to backup directory successfully.';
   } else {
    echo 'Failed to move image to backup directory.';
   }
    $_SESSION["add"]=$id." deleted successfully";
     header("Location:".HOMEURL."admin/post.php");}
     else{
        $_SESSION["add"]=" failed to delete";
        if(isset($_SESSION['add'])){
       echo "<h1 class='error'>". $_SESSION['add']."</h1>";
       unset($_SESSION['add']);}
    }
}




include("./parts/footer.php") ?>