<?php
require "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info : Home</title>
    
    <!-- ----- Boostrap style link ------- -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>



<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Details <a href="create.php" class="btn btn-primary float-end">Add Students</a></h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM students";
                            $query_run = mysqli_query($conn, $query);

                            // check for records by counting the rows
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
                                    echo $student['last_name'];
                            ?>
                                        <tr>
                                            <td><?= $student['student_id']?></td>
                                            <td><?= $student['first_name']?></td>
                                            <td><?= $student['last_name']?></td>
                                            <td><?= $student['email']?></td>
                                            <td><?= $student['phone']?></td>
                                            <td><?= $student['course']?></td> 
                                            <td>
                                                <a href="" class="btn btn-info btn-sm">View</a>
                                                <a href="edit.php?id=<?= $student['student_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                                            </td>                                           
                                        </tr>
                            <?php
                                }

                            }
                            else{
                                echo "<h5>No record found </h5>";
                            }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

  
<!--- Bootstrap javascript bundle -->
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>    
</body>
</html>