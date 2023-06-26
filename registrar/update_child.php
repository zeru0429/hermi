
<?php include("./parts/header.php"); 
?><?php
$id = $_GET['id'];
$mother_id_list = [];
$query = "SELECT m_id FROM cbtp.mother_table";
$result = mysqli_query($conn, $query) or die(mysqli_error());
$rows = mysqli_num_rows($result);
while ($rows = mysqli_fetch_assoc($result)) {
    array_push($mother_id_list, $rows['m_id']);
}

?>

<!--USER MODAL-->


<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-warning text-white">
            <h5 class="modal-title">Update Child</h5>
            <a href='./children.php' class="close" data-dismiss="modal">
                <span>&times;</span>
            </a>
        </div>

        <?php
        if (isset($_SESSION['add'])) {
            echo "<h1 class='error'>" . $_SESSION['add'] . "</h1>";
            unset($_SESSION['add']);
        }
        $query = "SELECT * FROM `cbtp`.`child_table` where c_id='$id'";
        $result = mysqli_query($conn, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $m_id = $rows['m_id'];
                $f_name = $rows['f_name'];
                $m_name = $rows["m_name"];
                $l_name = $rows['l_name'];
                $birthdate = $rows['bithdate'];
                $blood_type = $rows['blood_type'];
        ?>
                <form action='#' method='post' enctype='multipart/form-data'>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">mother id</label>

                            <select name="mother_id" id="mother_id">
                                <?php
                                foreach ($mother_id_list as $value) {
                                ?>
                                    <option value="<?php print_r($value); ?>" <?php if ($m_id == $value) echo "selected"; ?>> <?php print_r($value); ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="name">First name</label>
                            <input type="text" value='<?php echo $f_name ?>' class="form-control" name='f_name' />
                        </div>

                        <div class="form-group">
                            <label for="name">middle name</label>
                            <input type="text" value='<?php echo $m_name ?>' name='m_name' class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="name">Last name</label>
                            <input type="text" value='<?php echo $l_name ?>' name='l_name' class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="date-of-birth">Date of Birth</label>
                            <input type="date" value='<?php echo $birthdate ?>' class="form-control" id="date-of-birth" name="birthdate" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">blood type</label>
                            <select name="blood_type" class="form-control" id="blood_type" default>
                                <option value="A+" <?php if ($blood_type == "A+") echo "selected"; ?>>A+</option>
                                <option value="A-" <?php if ($blood_type == "A-") echo "selected"; ?>>A-</option>
                                <option value="B+" <?php if ($blood_type == "B+") echo "selected"; ?>>B+</option>
                                <option value="B-" <?php if ($blood_type == "B-") echo "selected"; ?>>B-</option>
                                <option value="AB+" <?php if ($blood_type == "AB+") echo "selected"; ?>>AB+</option>
                                <option value="AB-" <?php if ($blood_type == "AB-") echo "selected"; ?>>AB-</option>
                                <option value="O+" <?php if ($blood_type == "O+") echo "selected"; ?>>O+</option>
                                <option value="O-" <?php if ($blood_type == "O-") echo "selected"; ?>>O-</option>
                            </select>
                        </div>


        <?php
            }
        }
        ?>

        <div class="modal-footer">
            <label for=""><a href="children.php">Close</a></label>
            <input type="submit" class="btn btn-warning" name='updatechild' value="Update">
        </div>

        </div>
        </form>
    </div>
</div>
</div>
<!--  Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php
if (isset($_POST['updatechild'])) {
    $f_name = $_POST['f_name'];
    $m_name = $_POST["m_name"];
    $l_name = $_POST['l_name'];
    $birthdate = $_POST['birthdate'];
    $blood_type = $_POST['blood_type'];

    $query = "UPDATE `cbtp`.`child_table` SET
              m_id = '$m_id',
             f_name='$f_name', m_name='$m_name', 
             l_name='$l_name', bithdate='$birthdate',
             blood_type='$blood_type' where
             c_id='$id' ";

    $result = mysqli_query($conn, $query) or die(mysqli_error());

    if ($result == true) {
        $_SESSION["add"] = $f_name . " updated successfully";
       # header("Location:" . HOMEURL . "../registrar/children.php");
    } else {
        $_SESSION["add"] = "Failed to update.";
        if (isset($_SESSION['add'])) {
            echo "<h1 class='error'>" . $_SESSION['add'] . "</h1>";
            unset($_SESSION['add']);
        }
    }
}

include("./parts/footer.php");
