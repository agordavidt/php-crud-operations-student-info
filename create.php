<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info : Create</title>
    
    <!-- ----- Boostrap style link ------- -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Add Student Record
                        <a href="index.php" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="function.php" method="POST">
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
                            <button type="submit" name="save_record" class="btn btn-primary">Save Record</button>
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