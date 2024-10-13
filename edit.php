<?php
session_start();

// to use database
require "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info : Edit</title>
    
    <!-- ----- Boostrap style link ------- -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>

<div class="container mt-5">
    <?php

    include("message.php");
    // echo $_SESSION['message'];

    ?>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Student Record
                        <a href="index.php" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                <?php
                // check if id parameter is present or not.
                if(isset($_GET['id'])){

                    $student_id = mysqli_real_escape_string($conn,  $_GET['id']);
                    // echo $student_id;
                    
                    // always write the values in single quotes
                   $query = "SELECT * FROM students WHERE student_id = '$stuent_id'";

                }


                ?>
                    <form action="functions.php" method="POST">
                        <div class="mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" class="form-control" required >
                        </div>
                        <div class="mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" pattern="0{1}[0-9]{10}" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Course</label>
                            <input type="text" name="course" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="update_record" class="btn btn-primary">Update Record</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

  
<!--- Bootstrap javascript bundle -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>    
</body>
</html>