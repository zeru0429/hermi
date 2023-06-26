<?php include("./parts/header.php");

// find id
$id = $_GET['id'];
// delete from db
$query1 = "SELECT * FROM `cbtp`.`mother_table` WHERE m_id='$id' ";
$result1 = mysqli_query($conn,$query1)or die(mysqli_error());
$rows1 = mysqli_num_rows($result1);
while($rows1=mysqli_fetch_assoc($result1)){
  $photo_url = $rows1['photo_url'];
}


$sourceDirectory = '../images/mother/';
$destinationDirectory = '../backup/image/mother/';
$imageName =$photo_url;

$sourcePath = $sourceDirectory . $imageName;
$destinationPath = $destinationDirectory . $imageName;

// Check if the source file exists
if (file_exists($sourcePath)) {
    // Move the file to the destination directory
    if (rename($sourcePath, $destinationPath)) {
        echo "Image moved successfully.";
    } else {
        echo "Failed to move the image.";
    }
} else {
    echo "Source image does not exist.";
}


$query = "DELETE FROM `cbtp`.`mother_table` WHERE m_id='$id'";
$result = mysqli_query($conn,$query)or die(mysqli_error());
if($result == True){
    $_SESSION["add"]=$id." deleted successfully";
     header("Location:".HOMEURL."registrar/mother.php");
     
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