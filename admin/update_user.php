<?php include("./parts/header.php") ?>



 <!--USER MODAL-->
 
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-warning text-white">
            <h5 class="modal-title">Update User</h5>
            <button class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
        </div>

        <form action='./add-user.php' method='post' enctype='multipart/form-data' >
          <div class="modal-body">
           
              <div class="form-group">
                <label for="name">First name</label>
                <input type="text" class="form-control" name='f_name' />
              </div>

              <div class="form-group">
                <label for="name">middle name</label>
                <input type="text"  name='m_name' class="form-control" />
              </div>

              <div class="form-group">
                <label for="name">Last name</label>
                <input type="text"  name='l_name' class="form-control" />
              </div>

              <div class="form-group">
                <label for="name">username</label>
                <input type="text"  name='username' class="form-control" />
              </div>
              <div class="form-group">
                <label for="name">role</label>
                <input type="text"  name='role' class="form-control" />
              </div>

              <div class="form-group">
                <label for="name">Phone number</label>
                <input type="text"  name='phone_number' class="form-control" />
              </div>

              <div class="form-group">
                <label for="name">photo</label>
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