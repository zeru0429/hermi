<?php include("./parts/header.php");
    $c_id = $_GET['id'];
    $query = "SELECT * FROM cbtp.child_table WHERE c_id = $c_id";
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    if ($result) {
        while($rows=mysqli_fetch_assoc($result)){
        $f_name = $rows['f_name'];
        $m_name = $rows['m_name'];
        $l_name = $rows['l_name'];
        $birthdate = $rows['bithdate'];
        $blood_type = $rows['blood_type'];
        $m_id = $rows['m_id'];} 
    }
?>
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
<style>
    /* ...existing styles... */

    /* Child List Popup Styles */
    #childListPopup ul {
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }

    #childListPopup li {
        margin-bottom: 10px;
    }

    #childListPopup h2 {
        margin-bottom: 20px;
    }

    /* Vaccination Information Popup Styles */
    #popup form {
        margin-top: 20px;
    }

    #popup label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    #popup select {
        margin-bottom: 10px;
        padding: 8px;
        font-size: 14px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    #popup input[type="submit"],
    #popup button {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    #popup input[type="submit"] {
        color: #fff;
        background-color: #4267B2;
        border: none;
    }

    #popup button {
        color: #000;
        background-color: #e4e6eb;
        border: none;
        margin-right: 10px;
    }

    #popup input[type="submit"]:hover,
    #popup button:hover {
        background-color: #3b5998;
    }
</style>

<div class="profile-container">
    <h1>Chid profile</h1>
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
                    <td><strong>Mother Id:</strong></td>
                    <td><?php echo $m_id; ?></td>
            </table>

        </div
    <div><div>
        <a href="./mother_detail.php?id=<?php echo $m_id; ?>" class="btn-primary">View Mother </a>
        <button onclick="showPopup()" class="btn-primary">Vaccination Information</button>
    </div></div>
           
         <!-- Child List Popup -->
         <div class="overlay" id="overlay"></div>
        <div class="popup" id="childListPopup">
            <h2>Child List</h2>
            <!-- Add your child list content here -->
            <button onclick="hideChildListPopup()" class="btn-secondary">Close</button>
        </div>

        <!-- Vaccination Information Popup -->
<?php  
    $query = "SELECT * FROM cbtp.child_vaccine WHERE c_id = $c_id";    
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    while($rows=mysqli_fetch_assoc($result)){
        $r1 = $rows["r1"];
        $r2 = $rows["r2"];
        $r3 = $rows["r3"];
        $r4 = $rows["r4"];
        $r5 = $rows["r5"];
        } 
    ?>

        <div class="overlay" id="overlay"></div>
        <div class="popup" id="popup">
            <h2>Vaccination Information</h2>
    
        <form method="POST" action="#">
            <input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
            
            <label for="r1">r1:</label>
            <select name="r1" id="r1">
                <option value="1" <?php echo ($r1 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($r1 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <label for="r2">r2:</label>
            <select name="r2" id="r2">
                <option value="1" <?php echo ($r2 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($r2 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <label for="r3">r3:</label>
            <select name="r3" id="r3">
                <option value="1" <?php echo ($r3 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($r3 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <label for="r4">r4:</label>
            <select name="r4" id="r4">
                <option value="1" <?php echo ($r4 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($r4 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
            <label for="r5">r5:</label>
            <select name="r5" id="r5">
                <option value="1" <?php echo ($r5 == 1) ? "selected" : ""; ?>>1</option>
                <option value="0" <?php echo ($r5 == 0) ? "selected" : ""; ?>>0</option>
            </select>
            <br>
            
           
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
     $c_id = $_POST["c_id"];
     $r1 = $_POST["r1"];
     $r2 = $_POST["r2"];
     $r3 = $_POST["r3"];
     $r4 = $_POST["r4"];
     $r5 = $_POST["r5"];
     // Prepare and execute the query
     $query1 ="UPDATE `cbtp`.`child_vaccine` 
                 SET r1='$r1', r2='$r2' ,
                  r3='$r3', r4='$r4' , r5='$r5'
                   where c_id='$c_id' ";
    
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
        
 include("./parts/footer.php") ?>