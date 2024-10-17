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

    include "message.php";
    // echo $_SESSION['message'];

    ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
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
                   $query = "SELECT * FROM students WHERE student_id = '$student_id'";

                   // execute query
                   $query_run = mysqli_query($conn, $query);

                   // check for records in database table
                   if(mysqli_num_rows($query_run) > 0)
                   {
                        $student = mysqli_fetch_array($query_run);
                        // print_r($student);

                        ?>
                        <form action="functions.php" method="POST">
                            <!-- --- put student id in the form input ----  -->
                            <input type="hidden" name="student_id" value="<?= $student['student_id']; ?>">
                            <div class="mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" value="<?= $student['first_name']; ?>" class="form-control" required >
                            </div>
                            <div class="mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" value="<?= $student['last_name']; ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" value="<?= $student['email']; ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?= $student['phone']; ?>"  pattern="0{1}[0-9]{10}" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Course</label>
                                <input type="text" name="course" class="form-control" value="<?= $student['course']; ?>"  required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_record" class="btn btn-primary">Update Record</button>
                            </div>
                        </form>


                    <?php
                   }
                   else{
                    echo "<h4>ID not found!</h4>";
                   }

                }


                ?>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php

/* 
<!-- -- Handling the select options for edit ------  -->
 <!-- <div class="mb-3">                            
        <label for="">Course</label>
        <select name="course" class="form-control" required>
            <option value="" disabled>Choose your course</option>
            <option value="Chemistry" <?= $student['course'] == 'Chemistry' ? 'selected' : ''; ?>>Chemistry</option>
            <option value="Civil Engineering" <?= $student['course'] == 'Civil Engineering' ? 'selected' : ''; ?>>Civil Engineering</option>
            <option value="Pharmacy" <?= $student['course'] == 'Pharmacy' ? 'selected' : ''; ?>>Pharmacy</option>
            <option value="Geology" <?= $student['course'] == 'Geology' ? 'selected' : ''; ?>>Geology</option>
        </select>
    </div> -->


                *** using ****
                while

    */
    while($bloginfo =  $query_run->fetch_assoc())
    {

    }

    ?>



  
<!--- Bootstrap javascript bundle -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>    
</body>
</html>