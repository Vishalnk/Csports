<?php

   $conn=mysqli_connect('localhost','root','','csports');
   if (!$conn){
    //    die("nope".mysqli_connect_error());
       ?>
        <script>
            alert("ERROR in connecting to database :!");
        </script>
        <?php

   }
    else{
        ?>
        <!-- <script>
            alert("Database connected!");
        </script> -->
        <?php
    }
?>