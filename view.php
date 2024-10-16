<?php
// to use database
require "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info : View Details</title>
    
    <!-- ----- Boostrap style link ------- -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>

<div class="container mt-5">
   
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                 <div class="card-header">
                                <h4>View Student details
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
                      
                            <!-- --- put student id in the form input ----  -->
                            
                            
                            <div class="mb-3">
                                <label for="">First Name</label>
                                <p class="lead"><?= $student['first_name']; ?></p>
                               
                            </div>
                            <div class="mb-3">
                                <label for="">Last Name</label>
                                <p class="lead"><?= $student['last_name']; ?></p>
                               
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <p class="lead"><?= $student['email']; ?></p>
                               
                            </div>
                            <div class="mb-3">
                                <label for="">Phone</label>
                                <p class="lead"><?= $student['phone']; ?></p>
                                
                            </div>
                            <div class="mb-3">
                                <label for="">Course</label>
                                <p class="lead"><?= $student['course']; ?></p>
                              
                            </div>
                           


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

  
<!--- Bootstrap javascript bundle -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>    
</body>
</html>