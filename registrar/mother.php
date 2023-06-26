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
 <div id="addUserModal" class="modal fade">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-warning text-white">
            <h5 class="modal-title">Add mother</h5>
            <button class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>

        <form action='./add-user.php' method='post' enctype='multipart/form-data' >
          <div class="modal-body">
           
              <div class="form-group">
                <label for="name">First name</label>
                <input require type="text" class="form-control" name='f_name' />
              </div>

              <div class="form-group">
                <label for="name">middle name</label>
                <input require type="text"  name='m_name' class="form-control" />
              </div>

              <div class="form-group">
                <label for="name">Last name</label>
                <input require type="text"  name='l_name' class="form-control" />
              </div>
              <div class="form-group">
                  <label for="date-of-birth">Date of Birth</label>
                  <input require type="date"  class="form-control" id="date-of-birth" name="birthdate" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" required>
              </div>
              <div class="form-group">
                <label for="name">photo</label>
                <td> <input type="file" name="image" require> </td>
              </div>  

              <div class="form-group">
                <label for="name">blood type</label>
                <select require name="blood_type" class="form-control" id="blood_type" default>
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
                <input require type="tel" id="phone" name="phone_number" class="form-control"  placeholder="+251-XX-XXX-XXXX">
              </div>
              <div class="form-group">
                <label for="name">zone</label>
                <input require type="text"  name='zone' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">wereda</label>
                <input require type="text"  name='wereda' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">kebele</label>
                <input require type="text"  name='kebele' class="form-control" />
              </div>
              

              <div class="form-group">
                <label for="password">Password</label>
                <input require type="password" name='password' class="form-control" />
              </div>
              <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input require type="password" name='c_password' class="form-control" />
              </div>
          <div class="modal-footer">
            <button  data-dismiss="modal">Close</button>
            <input type="submit"  class="btn btn-warning" name='submit' value="submit">
          </div>

          </div>
        </form>
        </div>
      </div>
    </div>
    <!--  Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->






    <?php  include("./parts/footer.php") ?>