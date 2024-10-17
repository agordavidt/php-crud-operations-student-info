<?php  
// import database
require "config.php";

session_start();

// create and send information to database

if(isset($_POST['save_user'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $article = mysqli_real_escape_string($conn, $_POST['article']);

    $allowed_ext = array('png','jpg','jpeg','gif');
    if(!empty($_FILES['image']['name'])){
        // print_r($_FILES);
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        $file_tmp = $_FILES['image']['tmp_name'];
        //target directory
        $target_dir = "images/$file_name";

        // Get file ext
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        //echo $file_ext;

        //validate file ext
        if(in_array($file_ext, $allowed_ext)){
            if($file_size <= 100000){      //check file size
                move_uploaded_file($file_tmp, $target_dir);               

            } else{
                $_SESSION['message'] = 'File is too large';
            }
        }else{
            $_SESSION['message'] = 'Invalid file type';
        }

    }else{
         $_SESSION['message'] = 'Please choose a file';
    }

     $image = $target_dir;
    




    // execute query
    $query = "INSERT INTO userdb (name, title, article, image) VALUES ('$name', '$title', '$article', '$image')";
    $query_run = mysqli_query($conn, $query);




}



?>


<?php include "includes/header.php"; ?>



<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label  class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                         <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Article</label>
                            <textarea class="form-control" name="article"  rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" name="save_user" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
</div>
        </div>
    </div>
</div>



<?php include "includes/footer.php"; ?>