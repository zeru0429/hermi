<?php
include('./parts/header.php');
if(isset($_POST['submit'])){
    $m_id = $_POST['mother_id'];
    $f_name = $_POST['f_name'];
    $m_name = $_POST["m_name"];
    $l_name=$_POST['l_name'];
    $birthdate =$_POST['birthdate'];
    $blood_type = $_POST['blood_type'];
    
    $query ="INSERT INTO `cbtp`.`child_table` 
    (m_id,f_name,m_name,l_name,bithdate,blood_type)
     VALUES
    ('$m_id','$f_name','$m_name','$l_name','$birthdate','$blood_type')
    ";
   
    $result = mysqli_query($conn,$query)or die(mysqli_error());
 
if($result == True){
    $query2 = "INSERT INTO cbtp.child_vaccine (c_id, r1, r2, r3, r4, r5)
    VALUES (LAST_INSERT_ID(), 0, 0, 0, 0, 0)";
    $result2 = mysqli_query($conn, $query2) or die(mysqli_error());
    if ($result2) {
   $_SESSION["add"]=$username." sucessfully added";
    header("Location:".HOMEURL."registrar/children.php");
    }
}
else{
    $_SESSION["add"]=$username." failed to added";
    header("Location:".HOMEURL."registrar/add-child.php");
}
}
else{
    echo "btn not  clicked";
}


?>

<?php  include("./parts/footer.php"); ?>