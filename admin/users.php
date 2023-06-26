<?php include("./parts/header.php") ?>

<!--HEADER -->
<header id="main-header" class="py-2 bg-warning text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><i class="fa fa-users"> Users</i></h1>
      </div>
    </div>
  </div>
</header>

<!--ACTIONS BUTTONS-->
<section id="action" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ml-auto">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" id="search-input">
          <span class="input-group-btn">
            <button class="btn btn-warning" id="search-btn">Search</button>
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
                <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
                  <i class="fa fa-plus"> Add Users</i>
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
                <td>id</td>
                <th>username</th>
                <th>Role</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="users-table">
              <?php
              $query = "SELECT * FROM users";
              $result = mysqli_query($conn, $query) or die(mysqli_error());
              $rows = mysqli_num_rows($result);
              // check if query is successfully executed   
              if ($rows > 0) {
                $count = 1;
                // check the numbers of data in db
                while ($rows = mysqli_fetch_assoc($result)) {
                  $id = $rows['user_id'];
                  $username = $rows['username'];
                  $rol = $rows['role'];
                  $f_name = $rows['f_name'];
                  $m_name = $rows["m_name"];
                  $l_name = $rows['l_name'];
                  $phone_number = $rows["phone_number"];
                  $email = $rows['email'];
              ?>
                  <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $username ?></td>
                    <td><?php echo $rol; ?></td>
                    <td><?php echo $phone_number; ?></td>
                    <td><?php echo $email; ?></td>
                    <td>
                      <div class="row">
                        <div class="col-md-6">
                          <a href="update_user.php?id=<?php echo $id ?>" class="btn btn-primary btn-block">
                            <i class="fa fa-plus">Update</i>
                          </a>
                        </div>
                        <div class="col-md-6">
                          <a href="delete_user.php?id=<?php echo $id; ?>" class='btn btn-danger btn-block'>Delete</a>
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

<!--USER MODAL-->
<div id="addUserModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title">Add User</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <form action='./add-user.php' method='post' enctype='multipart/form-data'>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">First name</label>
            <input type="text" class="form-control" name='f_name' />
          </div>
          <div class="form-group">
            <label for="name">Middle name</label>
            <input type="text" name='m_name' class="form-control" />
          </div>
          <div class="form-group">
            <label for="name">Last name</label>
            <input type="text" name='l_name' class="form-control" />
          </div>
          <div class="form-group">
            <label for="name">Username</label>
            <input type="text" name='username' class="form-control" />
          </div>
          <div class="form-group">
            <label for="name">Role</label>
            <select name="role" id="role">
              <option value="admin">admin</option>
              <option value="registrar">registrar</option>
              <option value="doctor">doctor</option>
              <option value="mother">mother</option>
              <option value="guest">guest</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Phone number</label>
            <input type="text" name='phone_number' class="form-control" />
          </div>
          <div class="form-group">
            <label for="name">Photo</label>
            <td> <input type="file" name="image"> </td>
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name='email' class="form-control" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name='password' class="form-control" />
          </div>
          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name='c_password' class="form-control" />
          </div>
          <div class="modal-footer">
            <button data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-warning" name='submit' value="Submit">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $("#search-btn").click(function() {
      var searchValue = $("#search-input").val();
      $.ajax({
        url: "search.php",
        method: "POST",
        data: {
          search: searchValue
        },
        success: function(response) {
          $("#users-table").html(response);
        }
      });
    });
  });
</script>

<?php include("./parts/footer.php") ?>
