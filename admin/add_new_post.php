<?php include("./parts/header.php") ?>


<div id="addPostModal" class="">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Add Post</h5>
            <button class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" method="post">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name='titile' class="form-control" />
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name='catagory'>
                  <option value="mothers vacine">mothers vacine</option>
                  <option value="Children vacine">Children vacine</option>
                  <option value="Infact me">Infact me</option>
                  <option value="daily news">daily news</option>
                  <option value="other">other</option>
                </select>
              </div>
              <div class="form-group">
                <label for="file">Image Upload</label>
                <input type="file" name="image" id="image" class="form-control" />
                <small class="form-text text-muted">My file 3mb</small>
              </div>
              <div class="form-group">
                <label for="body">Body</label>
                <textarea name="editor1" id="" class="form-control"></textarea>
              </div>
              
               <div class="modal-footer">
                     <a href='post.php' class="btn btn-seconday" data-dismiss="modal">Close</a>
                     <input type="submit" name='updatepost' value="post" class="btn btn-primary">
                </div>

            </form>
          </div>
         
        </div>
      </div>
    </div>





<?php  


if(isset($_POST['updatepost'])){
    // print('<pre>');
    // print_r($_POST);
    $titile = $_POST['titile'];
    $catagory = $_POST['catagory'];
    $editor1 = $_POST["editor1"];
    $date_of_post = date('Y-m-d h:m:s');
    if(!isset($_FILES['image']['name'])){
        $image_name = "";
    }
    else{
        //to upload image we need three things
        //image name, source, destination
        $image_name = $_FILES['image']['name']; 
        $image_source = $_FILES['image']['tmp_name'];
     
        // to prevent image repleacement we rename image during uploading
        // 1st get extention
       // $parts = explode('.', $image_name);
        //$ext = end($parts);
        //$image_name ="food_catagory.'$ext'";
        $image_destination = "../images/posts/".$image_name;
      
       //finally upload
        $uplode = move_uploaded_file($image_source,$image_destination);
        //print_r($uplode);
       
        if($uplode==FALSE){
            $_SESSION["add"]="faile to upload image";
            header("Location:".HOMEURL."/admin/posts.php");
            die();
        }
        
    }



$query ="INSERT INTO `post` (tittle,catagory,description,date_of_post)
             VALUES('$titile','$catagory','$editor1','$date_of_post')";
$result = mysqli_query($conn,$query)or die(mysqli_error());
if($result == True){
    $_SESSION["add"]=$titile." sucessfully added";
    header("Location:".HOMEURL."admin/posts.php");
    
}else{
    $_SESSION["add"]=$titile." failed to added";
    
}

}else{
    echo "btn not  clicked";
}


include("./parts/footer.php") ?>