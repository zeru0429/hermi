<?php
include("./parts/header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mother Profile</title>
    <style>
        body {
            display: block;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
            background-color: #121212;
        }
        
        .profile-container {
            background-color: #1e1e1e;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            margin-top: -100px;
        }
        
        .profile-image {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
        }
        
        .profile-table {
            margin-top: 20px;
        }
        
        .profile-table td {
            padding: 10px;
        }
        
        .btn-primary {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
            background-color: #4267B2;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #3b5998;
        }
        
        .btn-secondary {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            color: #000;
            background-color: #e4e6eb;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        
        .btn-secondary:hover {
            background-color: #dfe3e8;
        }
        
        /* Overlay Styles */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }
        
        /* Popup Styles */
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            z-index: 1000;
            display: none;
        }
        
        /* Enable Pointer Events on Popup */
        .popup * {
            pointer-events: auto;
        }
    </style>

</head>
<body>
    <div class="profile-container">
        <h1>Mother Profile</h1>

        <?php
            $m_id = $_GET['id'];

            $query = "SELECT * FROM mother_table WHERE m_id = $m_id";
            $result = mysqli_query($conn, $query) or die(mysqli_error());

            if ($result) {
                while($rows=mysqli_fetch_assoc($result)){
                $f_name = $rows['f_name'];
                $m_name = $rows['m_name'];
                $l_name = $rows['l_name'];
                $birthdate = $rows['bithdate'];
                $photo_url = $rows['photo_url'];
                $blood_type = $rows['blood_type'];
                $m_phone = $rows['m_phone'];
                $zone = $rows['zone'];
                $wereda = $rows['wereda'];
                $kebele = $rows['kebele'];
            } 
        }
        ?>

            <div>
                <?php if (!empty($photo_url)) { ?>
                    <img class="profile-image" src="../images/mother/<?php echo $photo_url; ?>" alt="Profile Image">
                <?php } ?>
            </div>

            <div class="profile-table">
                <table>
                    <tr>
                        <td><strong>First Name:</strong></td>
                        <td><?php echo $f_name; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Middle Name:</strong></td>
                        <td><?php echo $m_name; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Last Name:</strong></td>
                        <td><?php echo $l_name; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Birthdate:</strong></td>
                        <td><?php echo $birthdate; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Blood Type:</strong></td>
                        <td><?php echo $blood_type; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Phone Number:</strong></td>
                        <td><?php echo $m_phone; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Zone:</strong></td>
                        <td><?php echo $zone; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Wereda:</strong></td>
                        <td><?php echo $wereda; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Kebele:</strong></td>
                        <td><?php echo $kebele; ?></td>
                    </tr>
                   
                </table>
            </div>

            <div>
                <a href="#" class="btn-primary">Child List</a>
                <button onclick="showPopup()" class="btn-primary">Vaccination Information</button>
            </div>
        </div>

        <!-- Child List Popup -->
        <div class="overlay" id="overlay"></div>
        <div class="popup" id="childListPopup">
            <h2>Child List</h2>
            <!-- Add your child list content here -->
            <button onclick="hideChildListPopup()" class="btn-secondary">Close</button>
        </div>

        <!-- Vaccination Information Popup -->
    <?php  
        $query = "SELECT * FROM cbtp.mother_vaccin WHERE m_id = $m_id";
        
        $result = mysqli_query($conn,$query) or die(mysqli_error());
        while($rows=mysqli_fetch_assoc($result)){
            $tt1 = $rows["tt1"];
            $tt2 = $rows["tt2"];
            $tt3 = $rows["tt3"];
            $tt4 = $rows["tt4"];
            $tt5 = $rows["tt5"];
            $rh = $rows["rh"];
        } 
    ?>

        <div class="overlay" id="overlay"></div>
        <div class="popup" id="popup">
            <h2>Vaccination Information</h2>
    
        <form method="POST" action="#">
            <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
            
            <label for="tt1">TT1:</label>
            <select name="tt1" id="tt1">
                <option value="1" <?php echo ($tt1 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($tt1 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <label for="tt2">TT2:</label>
            <select name="tt2" id="tt2">
                <option value="1" <?php echo ($tt2 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($tt2 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <label for="tt3">TT3:</label>
            <select name="tt3" id="tt3">
                <option value="1" <?php echo ($tt3 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($tt3 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <label for="tt4">TT4:</label>
            <select name="tt4" id="tt4">
                <option value="1" <?php echo ($tt4 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($tt4 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <label for="tt5">TT5:</label>
            <select name="tt5" id="tt5">
                <option value="1" <?php echo ($tt5 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($tt5 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <label for="rh">RH:</label>
            <select name="rh" id="rh">
                <option value="1" <?php echo ($rh == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($rh == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <input type="submit" value="Save" name="vacinate">
            <button onclick="hidePopup()" type="button">Cancel</button>
        </form>

        </div>

        <script>
            function showPopup() {
                document.getElementById("overlay").style.display = "block";
                document.getElementById("popup").style.display = "block";
            }

            function hidePopup() {
                document.getElementById("overlay").style.display = "none";
                document.getElementById("popup").style.display = "none";
            }

            function showChildListPopup() {
                document.getElementById("overlay").style.display = "block";
                document.getElementById("childListPopup").style.display = "block";
            }

            function hideChildListPopup() {
                document.getElementById("overlay").style.display = "none";
                document.getElementById("childListPopup").style.display = "none";
            }
        </script>



 <?php 
 
 if (isset($_POST["vacinate"])) {
     $m_id = $_POST["m_id"];
     $tt1 = $_POST["tt1"];
     $tt2 = $_POST["tt2"];
     $tt3 = $_POST["tt3"];
     $tt4 = $_POST["tt4"];
     $tt5 = $_POST["tt5"];
     $rh = $_POST["rh"];
     // Prepare and execute the query
     $query1 ="UPDATE `cbtp`.`mother_vaccin` 
                 SET m_id ='$m_id',  tt1='$tt1', tt2='$tt2' ,
                  tt3='$tt3', tt4='$tt4' , tt5='$tt5' , rh='$rh'
                   where m_id='$m_id' ";

     $result1 = mysqli_query($conn,$query1)or die(mysqli_error());
     if($result1 == True){
         $_SESSION["add"]=$m_id." sucessfully added";
         # header("Location:".HOMEURL."health/mother_detail.php");
          echo $_SESSION['add'];
          unset($_SESSION['add']);
          
      }else{
          $_SESSION["add"]=$m_id." failed to added";
          echo $_SESSION['add'];
          unset($_SESSION['add']);
      }
 
 
 }else{
     echo "btn not  clicked";
 }
 
  include("./parts/footer.php");?>
 
 include('./parts/footer.php'); ?>

