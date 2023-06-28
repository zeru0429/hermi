      <?php include("./parts/header.php") ?>

        <!--HEADER -->
      <header id="main-header" class="py-2 bg-warning text-white">
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h1><i class="fa fa-users">Mothers</i></h1>
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
                  <input type="text" class="form-control" placeholder="search">
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
              <a href="#"
                class="btn btn-warning btn-block"
                data-toggle="modal"
                data-target="#addUserModal">
                <i class="fa fa-plus"> Add Mother</i>
                
              </a>
            </div>
          <?php
          if(isset($_SESSION['add'])){
            echo "<h1 class='error'>". $_SESSION['add']."</h1>";
            unset($_SESSION['add']);}
    
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
                    <th>First name</th>
                    <th>Middle name</th>
                    <th>Last name</th>
                  </tr>
                </thead>
                <tbody>
  <?php
          $query = "SELECT * FROM cbtp.mother_table";
          $result = mysqli_query($conn,$query) or die(mysqli_error());
          $rows = mysqli_num_rows($result);
          // check if query is successfully excuted   
          if ($rows>0){
            $count=1;
              // check the numbers of data in db
                  while($rows=mysqli_fetch_assoc($result)){
                    $id=$rows['m_id'];
                    $f_name = $rows['f_name'];
                    $m_name = $rows["m_name"];
                    $l_name=$rows['l_name'];
          ?>
                  <tr>
                      <td><?php echo $id; ?></td>
                      <td><?php echo $f_name;?></td>
                      <td><?php echo $m_name ?></td>
                      <td><?php echo $l_name ?></td>
                      <td>

          <div class="row">
          <div class="col-md-6">
              <a
                href="update_user.php?id=<?php echo $id ?>"
                class="btn btn-primary btn-block"
          
                ><i class="fa fa-plus">Update </i>
              </a>
            </div>

            <div class="col-md-6">
            

            <a href="delete_user.php?id=<?php echo $id;?>"  class='btn btn-danger btn-block'>Delete </a> 
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
                  </select> 
                </div>
  <!--USER MODAL-->
  <!--USER MODAL-->
<div id="addUserModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title">Add mother</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="./add-user.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">First name</label>
            <input required type="text" class="form-control" name="f_name" />
          </div>

          <div class="form-group">
            <label for="name">Middle name</label>
            <input required type="text" name="m_name" class="form-control" />
          </div>

          <div class="form-group">
            <label for="name">Last name</label>
            <input required type="text" name="l_name" class="form-control" />
          </div>

          <div class="form-group">
            <label for="date-of-birth">Date of Birth</label>
            <input required type="date" class="form-control" id="date-of-birth" name="birthdate" />
          </div>

          <div class="form-group">
            <label for="name">Photo</label>
            <input required type="file" name="image">
          </div>

          <div class="form-group">
            <label for="name">Blood type</label>
            <select required name="blood_type" class="form-control" id="blood_type" default>
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

          <div class="form-group">
            <label for="name">Phone number</label>
            <input required type="tel" id="phone" name="phone_number" class="form-control" placeholder="+251-XX-XXX-XXXX">
          </div>

          <div class="form-group">
            <label for="name">Zone</label>
            <input required type="text" name="zone" class="form-control" />
          </div>

          <div class="form-group">
            <label for="name">Wereda</label>
            <input required type="text" name="wereda" class="form-control" />
          </div>

          <div class="form-group">
            <label for="name">Kebele</label>
            <input required type="text" name="kebele" class="form-control" />
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input required type="password" name="password" class="form-control" />
          </div>

          <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input required type="password" name="c_password" class="form-control" />
          </div>

          <div class="modal-footer">
            <button data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-warning" name="submit" value="Submit">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // Function to validate the form
  function validateForm() {
    // Validate the birthdate
    var birthdateInput = document.getElementById("date-of-birth").value;
    var birthdate = new Date(birthdateInput);
    var currentDate = new Date();
    var minAgeDate = new Date();
    minAgeDate.setFullYear(currentDate.getFullYear() - 10); // Minimum age of 10 years

    // Check if the birthdate is in the future or less than 10 years from now
    if (birthdate > currentDate || birthdate > minAgeDate) {
      alert("Please enter a valid birthdate that is at least 10 years ago.");
      return false; // Prevent form submission
    }

    // Validate the phone number
    var phoneNumberInput = document.getElementById("phone").value;
    var phoneNumberPattern = /^\+251\d{2}\d{3}\d{4}$/; // E.g., +251-XX-XXX-XXXX

    if (!phoneNumberPattern.test(phoneNumberInput)) {
      alert("Please enter a valid phone number in the format +251-XX-XXX-XXXX.");
      return false; // Prevent form submission
    }

    // Add additional validations if needed

    return true; // Allow form submission
  }
</script>





      <?php  include("./parts/footer.php") ?>