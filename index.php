
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="style.min.css" />
    <title>Admin UI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .crop-text {
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 3; /* Number of lines to show */
      -webkit-box-orient: vertical;
    }
  </style>
  </head>
  <body>
    <!-- NAVIGATION-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
      <div class="container">
        <a href="index.php" class="navbar-brand">Infant Immunization</a>
        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarNav"
        ></button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="./login.php" class="nav-link">
                <i class="fa fa-user-times"> Login</i>
              </a>
            </li>
            <li class="nav-item">
              <a href="About.php" class="nav-link">
                <i class="fa fa-user-times"> About</i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--HEADER -->
    <header id="main-header" class="py-2 bg-primary text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1><i class="fa fa-gear">Vaccination News</i></h1>
          </div>
        </div>
      </div>
    </header>

              
                <?php
                      include('./config/constant.php');
                      $query = "SELECT post.tittle, 
                      post.post_id,
                      post.catagory,
                      post.description,
                      post.date_of_post,
                      post_img.img_url
                      FROM post
                      INNER JOIN post_img
                      ON post.post_id = post_img.post_id order by post.date_of_post DESC;";

                    $result = mysqli_query($conn,$query) or die(mysqli_error());
                    $rows = mysqli_num_rows($result);    
                      if ($rows>0){
                              while($rows=mysqli_fetch_assoc($result)){
                                $id=$rows['post_id'];
                                $title = $rows['tittle'];
                                $catagory = $rows['catagory'];
                                $description = $rows['description'];
                                $date_of_post = $rows['date_of_post'];
                                $img_url = $rows['img_url'];
                          
                ?>

    <section id="posts">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
                     <!-- News Card -->
                    <div class="card">
                      <img src="./images/posts/<?php echo $img_url; ?>" class="card-img-top" alt="<?php echo $img_url; ?>">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $title; ?></h5>
                        <p class="card-text full-description" style="display: none;"><?php echo $description; ?></p>
                        <p>  <?php echo $date_of_post ?> </p>
                      </div>
                    </div>
                    <!-- End News Card -->
            </div>
          </div>
          
        </div>
     </div>
    </section>
                                
            <?php     }} ?>

    <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <p class="lead text-center">Copy right &copy; 2023</p>
          </div>
        </div>
      </div>
    </footer>

    
  </body>
</html>
