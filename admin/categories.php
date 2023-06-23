<?php include("./parts/header.php") ?>

    <!--HEADER -->
    <header id="main-header" class="py-2 bg-success text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1><i class="fa fa-folder"> Vaccines</i></h1>
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
              <input type="text" class="form-control" placeholder="search" />
              <span class="input-group-btn">
                <button class="btn btn-success">Search</button>
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
            <div class="card">
              <div class="card-header">
                <h4>Latest Category</h4>
              </div>
              <table class="table table-striped">
                <thead class="thead-inverse">
                  <tr>
                  <th>#</th>
                    <th>vaccine_name</th>
                    <th>description</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                      $query = "SELECT * FROM vaccination_description";
                      $result = mysqli_query($conn,$query) or die(mysqli_error());
                      $rows = mysqli_num_rows($result);  
                      if ($rows>0){
                              while($rows=mysqli_fetch_assoc($result)){
                                $id=$rows['id'];
                                $vaccine_name = $rows['vaccine_name'];
                                $description= $rows['description'];
                            
                          ?>
                  <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $vaccine_name ?></td>
                    <td><?php echo $description ?></td>
                  </tr>
                  
                  <?php }} ?>
                  
                </tbody>
              </table>
              <nav class="ml-4">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a href="'#'" class="page-link">Previous</a>
                  </li>
                  <li class="page-item active">
                    <a href="'#'" class="page-link">1</a>
                  </li>
                  <li class="page-item">
                    <a href="'#'" class="page-link">2</a>
                  </li>
                  <li class="page-item">
                    <a href="'#'" class="page-link">3</a>
                  </li>
                  <li class="page-item">
                    <a href="'#'" class="page-link">Next</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php  include("./parts/footer.php") ?>