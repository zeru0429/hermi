<?php include("./parts/header.php") ?>

    <!--HEADER -->
    <header id="main-header" class="py-2 bg-success text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1><i class="fa fa-folder"> Categories</i></h1>
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
                    <th>Categories</th>
                    <th>date Posted</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Vaccines given at birth</td>
                    <td>June 21, 2023</td>
                  </tr>
                  <tr>
                    <td>Vaccines given for two months babies</td>
                    <td>June 24, 2023</td>
                  </tr>

                  <tr>
                    <td>Vaccines given for four months babies</td>
                    <td>June 24, 2023</td>
                  </tr>
                  <tr>
                    <td>Vaccines given for six months babies</td>
                    <td>June 24, 2023</td>
                  </tr>
                  <tr>
                    <td>Vaccines given for twelve months babies</td>
                    <td>June 24, 2023</td>
                  </tr>
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