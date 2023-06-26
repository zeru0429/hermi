<?php include("./parts/header.php") ?>
 
<?php

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $role = $_POST['role'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST["m_name"];
    $l_name=$_POST['l_name'];
    $phone_number = $_POST["phone_number"];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if(!isset($_FILES['image']['name'])){
        $image_name = "";
    }
    else {
        $image_name = $_FILES['image']['name'];
        $image_source = $_FILES['image']['tmp_name'];
        
        // Get the file extension
        $extension = pathinfo($image_name, PATHINFO_EXTENSION);
        
        // Generate the new image name
        $new_image_name = $id . $f_name . $m_name . $lname . '.' . $extension;
        
        $image_destination = "../images/users/" . $new_image_name;

        $upload = move_uploaded_file($image_source, $image_destination);

        if ($upload == FALSE) {
            $_SESSION["add"] = "Failed to upload image";
            header("Location:" . HOMEURL . "/registrar/mother.php");
            die();
        }
    }
    
    $query ="INSERT INTO `cbtp`.`users` (f_name,m_name,l_name,username,password,phone_number,email,role,image_url) VALUES('$f_name','$m_name','$l_name','$username','$password','$phone_number','$email','$role','$new_image_name')";
    echo $query;
    $result = mysqli_query($conn,$query)or die(mysqli_error());
 
if($result == True){
   $_SESSION["add"]=$username." sucessfully added";
    header("Location:".HOMEURL."admin/users.php");
    
}else{
    $_SESSION["add"]=$username." failed to added";
    header("Location:".HOMEURL."admin/add-user.php");
}

}else{
    echo "btn not  clicked";
}




?>

<?php  include("./parts/footer.php") ?>