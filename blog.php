<?php 

require "config.php";
?>


<?php include "includes/header.php"; ?>



<div class="container mt-5 bg-secondary">
    <div class="row">
        <div class="col-md-8 mx-auto mt-5">

        <?php

            $query = "SELECT * FROM userdb";
            $query_run = mysqli_query($conn, $query);

            // check for records in the user table
            if(mysqli_num_rows($query_run) > 0){
                foreach($query_run as $bloginfo)
                {
                    ?>
                    <div class="card mb-3">
                        <img src="<?= $bloginfo['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $bloginfo['title']; ?></h5>
                        <p class="card-text"><?= $bloginfo['article']; ?></p>
                        <p class="card-text"><small class="text-muted"><?= $bloginfo['name']; ?></small></p>
                </div>
            </div>
                    
                    
                    <?php
                }

            }
            else{
                echo 'No records found';
            }

        ?>

            
                
        </div>
    </div>
</div>




<?php include "includes/footer.php"; ?>