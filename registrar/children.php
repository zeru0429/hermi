<?php include("./parts/header.php"); ?>

<?php
$mother_id_list = [];
$query = "SELECT m_id FROM cbtp.mother_table";
$result = mysqli_query($conn, $query) or die(mysqli_error());
$rows = mysqli_num_rows($result);
while ($rows = mysqli_fetch_assoc($result)) {
    array_push($mother_id_list, $rows['m_id']);
}
?>

<!-- HEADER -->
<header id="main-header" class="py-2 bg-warning text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><i class="fa fa-users"></i> Children</h1>
            </div>
        </div>
    </div>
</header>

<!-- ACTIONS BUTTONS -->
<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-warning">Search</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col">
                <section id="action" class="py-4 mb-4 bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="#" class="btn btn-warning btn-block" data-toggle="modal"
                                    data-target="#addUserModal">
                                    <i class="fa fa-plus"></i> Add Children
                                </a>
                            </div>
                            <?php
                            if (isset($_SESSION['add'])) {
                                echo "<h1 class='error'>" . $_SESSION['add'] . "</h1>";
                                unset($_SESSION['add']);
                            }
                            ?>
                        </div>
                    </div>
                </section>
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Users</h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                            <tr>
                                <td>ID</td>
                                <th>Mother ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM cbtp.child_table";
                            $result = mysqli_query($conn, $query) or die(mysqli_error());
                            $rows = mysqli_num_rows($result);
                            // check if query is successfully executed   
                            if ($rows > 0) {
                                $count = 1;
                                // check the number of data in db
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $id = $rows['c_id'];
                                    $m_id = $rows['m_id'];
                                    $f_name = $rows['f_name'];
                                    $m_name = $rows["m_name"];
                                    $l_name = $rows['l_name'];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $m_id; ?></td>
                                <td><?php echo $f_name; ?></td>
                                <td><?php echo $m_name; ?></td>
                                <td><?php echo $l_name; ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="update_child.php?id=<?php echo $id; ?>"
                                                class="btn btn-primary btn-block">
                                                <i class="fa fa-plus"></i> Update
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="delete_child.php?id=<?php echo $id; ?>"
                                                class='btn btn-danger btn-block'>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- USER MODAL -->
<div id="addUserModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Add Child</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action='./add-child.php' method='post' enctype='multipart/form-data'>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="mother_id">Mother ID</label>
                        <select name="mother_id" id="mother_id" class="form-control">
                            <?php
                            foreach ($mother_id_list as $value) {
                            ?>
                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" class="form-control" name='f_name' required>
                    </div>
                    <div class="form-group">
                        <label for="m_name">Middle Name</label>
                        <input type="text" class="form-control" name='m_name' required>
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" class="form-control" name='l_name' required>
                    </div>
                    <div class="form-group">
                        <label for="date-of-birth">Date of Birth</label>
                        <input type="date" class="form-control" id="date-of-birth" name="birthdate" required>
                    </div>
                    <div class="form-group">
                        <label for="blood_type">Blood Type</label>
                        <select name="blood_type" class="form-control" id="blood_type">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-warning" name='submit' value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include("./parts/footer.php"); ?>
