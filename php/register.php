<?php
    include ("../php/links.php");
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $mail=$_POST['mail'];
    include '../php/DBconnection.php';
    $sel11="select * from register where name='$name' or mail='$mail'";
    $que11=mysqli_query($conn,$sel11);
    $coun11=mysqli_num_rows($que11);
    $res11=mysqli_fetch_array($que11);
    if($coun11>0){
        ?>
        <html>
        <head>
            <link rel="stylesheet" href="../css/register.css">    
        </head>
        <body>
            <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REGISTRATION ERROR!</h5><i class="fas fa-volleyball-ball"></i>
                </div>
                <div class="modal-body">
                    <p>USERNAME OR MAIL ID ALREADY EXISTS! </p>
                    <br><br>
                    <i class="fas fa-exclamation-triangle warn"></i>
                </div>
            </div>
            </div>
        </body>
    </html>
    <?php
         header("refresh:3; url=../front_page.php");
    }
    else{
        $sql1="insert into register (name,password,mail) values('$name','$pass','$mail')";
        $query1=mysqli_query($conn,$sql1);
                ?>
                <html>
                <head>
                    <link rel="stylesheet" href="../css/register.css">    
                </head>
                <body>
                    <div class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">REGISTRATION SUCCESSFUL </h5><i class="fas fa-volleyball-ball"></i>
                        </div>
                        <div class="modal-body">
                            <p>LOGIN to access your account! </p>
                            <br><br>
                            <div class="loader"></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </body>
            </html>
                <?php
                header("refresh:3; url=../front_page.php");
    }
    
    
    
?>
