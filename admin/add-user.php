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
    else{
        //to upload image we need three things
        //image name, source, destination
        $image_name = $_FILES['image']['name']; 
        $image_source = $_FILES['image']['tmp_name'];
     
        // to prevent image repleacement we rename image during uploading
        // 1st get extention
       // $parts = explode('.', $image_name);
        //$ext = end($parts);
        //$image_name ="food_catagory.'$ext'";
        $image_destination = "../images/users/".$image_name;
      
       //finally upload
        $uplode = move_uploaded_file($image_source,$image_destination);
        //print_r($uplode);
       
        if($uplode==FALSE){
            $_SESSION["add"]="faile to upload image";
            header("Location:".HOMEURL."/admin/users.php");
            die();
        }
        
    }
    
    $query ="INSERT INTO `cbtp`.`users` (f_name,m_name,l_name,username,password,phone_number,email,role,image_url) VALUES('$f_name','$m_name','$l_name','$username','$password','$phone_number','$email','$role','$image_name')";
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