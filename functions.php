<?php 

// import database

require 'config.php';

// quick test for connection  
// echo 'connection is successful';

// create student record
// check if button is clicked or not with the isset function
if(isset($_POST['save_record'])){
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    // write the sql query
    $query = "INSERT INTO students (first_name, last_name, email, phone, course) VALUES ('$first_name', '$last_name', '$email', '$phone', '$course')";

    // store the run query command into a variale
    $query_run = mysqli_query($conn, $query);

    // check if query is true
    if($query_run)
    {
        echo "Record successfully added";
        header("Location: create.php");
        exit(0);
    }
    else
    {

    }

}
