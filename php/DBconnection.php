<?php

   $conn=mysqli_connect('localhost','root','Josephite1999','csports');
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