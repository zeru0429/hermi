<?php
include("./parts/header.php");
if(isset($_POST['updateuser'])){
    $username = $_POST['username'];
    $role = $_POST['role'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST["m_name"];
    $l_name=$_POST['l_name'];
    $phone_number = $_POST["phone_number"];
    $email = $_POST['email'];

    // print('<pre>');
    // print_r($_POST);


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
            header("Location:".HOMEURL."/admin/users.php");
            die();
        }
     
    }

    $query ="UPDATE `cbtp`.`users` SET
             f_name='$f_name', m_name='$m_name', 
             l_name='$l_name', username='$username', 
             phone_number='$phone_number', 
             email='$email', role='$role' where user_id='$id1' ";

    $result = mysqli_query($conn,$query)or die(mysqli_error());

    if($result == True){
        $_SESSION["add"]=$username." sucessfully added";
        header("Location:".HOMEURL."admin/users.php");
         
     }else{
         $_SESSION["add"]=$username." failed to added";
         header("Location:".HOMEURL."admin/update_user.php");
     }
     
}

include("./parts/footer.php") ?>