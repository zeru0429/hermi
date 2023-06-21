<?php include("./parts/header.php") ?>

       <!--HEADER -->
     <header id="main-header" class="py-2 bg-primary text-white">
       <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h1><i class="fa fa-pencil"> Posts</i></h1>
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
                    <button class="btn btn-primary">Search</button>
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
              <h4>Latest Posts</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Categories</th>
                  <th>date Posted</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scopr="row">1</td>
                  <td>Post One</td>
                  <td>Vaccines given at birth</td>
                  <td>June 21, 2023</td>
                  <td>
                    <a href="details.html" class="btn btn-secondary"
                      ><i class="fa fa-angle-double-right"> Details</i></a
                    >
                  </td>
                </tr>
                <tr>
                  <td scopr="row">2</td>
                  <td>Post two</td>
                  <td>Vaccines given for two months babies</td>
                  <td>June 21, 2023</td>
                  <td>
                    <a href="details.html" class="btn btn-secondary"
                      ><i class="fa fa-angle-double-right"> Details</i></a
                    >
                  </td>
                </tr>
                <tr>
                  <td scopr="row">3</td>
                  <td>Post there</td>
                  <td>Vaccines given for four months babies</td>
                  <td>June 21, 2023</td>
                  <td>
                    <a href="details.html" class="btn btn-secondary"
                      ><i class="fa fa-angle-double-right"> Details</i></a
                    >
                  </td>
                </tr>
                <tr>
                  <td scopr="row">4</td>
                  <td>Post Four</td>
                  <td>Vaccines given for six months babies</td>
                  <td>June 21, 2023</td>
                  <td>
                    <a href="details.html" class="btn btn-secondary"
                      ><i class="fa fa-angle-double-right"> Details</i></a
                    >
                  </td>
                </tr>
                <tr>
                  <td scopr="row">5</td>
                  <td>Post five</td>
                  <td>Vaccines given for twelve months babies</td>
                  <td>June 21, 2023</td>
                  <td>
                    <a href="details.html" class="btn btn-secondary"
                      ><i class="fa fa-angle-double-right"> Details</i></a
                    >
                  </td>
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
                     <li class="page-item ">
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

  </select> 
 </div>
              <div class="form-group">
                <label for="file">Image Upload</label>
                <input type="file" name="" id="" class="form-control">
                <small class="form-text text-muted">Ma file 3mb</small>
              </div>
              <div class="form-group">
                <label for="body">Body</label>
                <textarea name="editor1" id=""  class="form-control"></textarea>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-seconday" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" data-dismiss="modal">Save Changes</button>
        </div>
      </div>
    </div>
<?php  include("./parts/footer.php") ?>