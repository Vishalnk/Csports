<?php
    include ("../php/links.php");
    include '../php/DBconnection.php';
    $old_pass=$_POST['oldpass'];
    $new_pass=$_POST['newpass'];
    session_start();
    foreach($_SESSION['userdetails'] as $key=>$value){
        $name=$value['username'];
    }
    $sel="select password from register where name='$name'";
    $que=mysqli_query($conn,$sel);
    $res=mysqli_fetch_array($que);
    if($old_pass==$res[0]){
        $sel1="update register set password='$new_pass' where name='$name'";
        $que1=mysqli_query($conn,$sel1);
        $_SESSION['userdetails'][0]['userpass']=$new_pass;
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
                        <p>YOUR PASSWORD HAS BEEN UPDATED!  <br><br>
                    </div>
                </div>
                </div>
            </body>
            </html>
        <?php
        header("refresh:3; url=../php/profile.php");
    }
    else{
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
                        <h5 class="modal-title">ERROR! </h5><i class="fas fa-volleyball-ball"></i>
                    </div>
                    <div class="modal-body">
                        <p>YOUR OLD PASSWORD IS INCORRECT... <br><br>
                    </div>
                </div>
                </div>
            </body>
            </html>
            <?php
    }
            header("refresh:3; url=../php/profile.php");
       
            ?>

