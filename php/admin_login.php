<?php
    include ("../php/links.php");
    $namee=$_POST['namee'];
    $passs=$_POST['passs'];
    include '../php/DBconnection.php';
    $sel="select * from admin where name='$namee' and passcode='$passs'";
    $que=mysqli_query($conn,$sel);
    $coun=mysqli_num_rows($que);
    $res=mysqli_fetch_array($que);
    if($coun==1){
        session_start();
        $_SESSION['admin']=array('a_name'=>$res[0],'pass'=>$_POST['passs']);
        if(isset($_SESSION['admin'])){
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
                        <h5 class="modal-title">LOGIN SUCCESSFUL </h5><i class="fas fa-volleyball-ball"></i>
                    </div>
                    <div class="modal-body">
                        <p>Welcome admin! <br><br>Getting your page ready!</p>
                        <br><br>
                        <div class="loader"></div>
                    </div>
                    </div>
                </div>
                </div>
            </body>
            </html>
            
            <?php
            header("refresh:2; url=../php/admin.php");
        }
        else{
            echo "please login to continue";
            header("refresh:3; url=../front_page.php");
    
        }
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
                        <h5 class="modal-title">INVALID CREDENTIALS! </h5><i class="fas fa-volleyball-ball"></i>
                    </div>
                    <div class="modal-body">
                        <p>KINDLY ENTER THE RIGHT LOGIN CREDENTIALS. </p>
                        
                    </div>
                    </div>
                </div>
                </div>
            </body>
          </html>
        <?php
        header("refresh:2; url=../front_page.php");

    }
?>