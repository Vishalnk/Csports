<?php
    include ("../php/links.php");
    include '../php/DBconnection.php';
    $new_mail=$_POST['newmail'];
    session_start();
    foreach($_SESSION['userdetails'] as $key=>$value){

        $name=$value['username'];
    }
    $sel="update register set mail='$new_mail' where name='$name'";
    $que=mysqli_query($conn,$sel);
    $_SESSION['userdetails'][0]['usermail']=$new_mail;
    ?>
            <html>
            <head>
                <link rel="stylesheet" href="../php/login.css">    
            </head>
            <body>
                <div class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">UPDATE SUCCESSFUL </h5><i class="fas fa-volleyball-ball"></i>
                    </div>
                    <div class="modal-body">
                        <p>YOUR NEW MAIL ID IS UPDATED SUCCESSFULLY!  <br><br>
                    </div>
                </div>
                </div>
            </body>
            </html>
            
            <?php
            header("refresh:3; url=../php/profile.php");
       
            ?>
            </body>
          </html>

