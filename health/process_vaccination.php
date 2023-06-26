<?php 
include("./parts/header.php");

if (isset($_POST["vacinate"])) {
    $m_id = $_POST["m_id"];
    $tt1 = $_POST["tt1"];
    $tt2 = $_POST["tt2"];
    $tt3 = $_POST["tt3"];
    $tt4 = $_POST["tt4"];
    $tt5 = $_POST["tt5"];
    $rh = $_POST["rh"];
    // Prepare and execute the query
    $query ="UPDATE `cbtp`.`mother_vaccin` 
                SET m_id ='$m_id',  tt1='$tt1', tt2='$tt2' ,
                 tt3='$tt3', tt4='$tt4' , tt5='$tt5' , rh='$rh' ";

    
    $result = mysqli_query($conn,$query)or die(mysqli_error());
    if($result == True){
        $_SESSION["add"]=$m_id." sucessfully added";
         header("Location:".HOMEURL."health/mother_detail.php");
         
     }else{
         $_SESSION["add"]=$m_id." failed to added";
         header("Location:".HOMEURL."health/process_vaccination.php");
     }


}else{
    echo "btn not  clicked";
}

 include("./parts/footer.php");?>