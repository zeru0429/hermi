<?php
include("./parts/header.php");
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
        #header("Location:".HOMEURL."registrar/mother.php");
         
     }else{
        
           $_SESSION["add"]=" failed to Update";
         if(isset($_SESSION['add'])){
        echo "<h1 class='error'>". $_SESSION['add']."</h1>";
        unset($_SESSION['add']);

     }
     
}

}

include("./parts/footer.php") ?>