<?php
    include ("../php/links.php");
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    include '../php/DBconnection.php';
    $sel="select * from register where name='$name' and password='$pass'";
    $que=mysqli_query($conn,$sel);
    $coun=mysqli_num_rows($que);
    $res=mysqli_fetch_array($que);
    if($coun==1){
        session_start();
        $_SESSION['userdetails'][0]=array('username'=>$res[0],'userpass'=>$_POST['pass'],'usermail'=>$res[2],'points'=>$res[3]);
        if(isset($_SESSION['userdetails'])){
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
                        <p>You will be redirected to your account! <br><br>Getting your page ready!</p>
                        <br><br>
                        <div class="loader"></div>
                    </div>
                    </div>
                </div>
                </div>
            </body>
            </html>
            
            <?php
            header("refresh:3; url=../php/user_page.php");
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







<!-- 
echo $_SESSION['uname'];
        echo "
        <html>
        <body>
        <h2>hello". $_SESSION['uname']."</h2>



        <a href='logout.php'>logout</a>
        </body>
        </html>
        "; -->
<!-- <html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Csports</title>
        <link rel="shortcut icon" type="image" href="./icons/Csports/logo 3/CS-logos_white.png">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="./css/all.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            *{
                margin:0;
                padding:0;
            }
            .hero{
                height: 100%;
                width: 100%;
                position:absolute;
            }
            .form-box{
                width:380px;
                height: 480px;
                position: relative;
                margin:6% auto;
                background-color: #fff;
                padding:5px;
            }
            .button-box{
                width:240px;
                margin:35px auto;
                position:relative;
                box-shadow:0 0 20px 9px #ff61241f;
                border-radius:30px;
            }
            .toggle-btn{
                padding:10px 30px;
                cursor:pointer;
                background:transparent;
                border:0;
                outline:none;
                position:relative;
            }
            #btn{
                top:0;
                left:0;
                position:absolute;
                width:110px;
                height:100%;
                background: linear-gradient(to right, #ff105f,#ffad06);
                border-radius:30px;
                transition:.5s;
            }
            .social-icons{
                margin:30px;
                text-align:center;
            }
            .social-icons img{
                width: 30px;
                margin:0 12px;
                box-shadow: 0 0 20px 0 #7f7f7f3d;
                text-align:center;
                cursor: pointer;
                border-radius: 30px;
            }
            .input-group{
                top:180px;
                position: absolute;
                width: 280px;
                transition: .5s;
            }
            .input-field{
                width:100%;
                padding:10px 0;
                margin: 5px 0;
                border-top: 0;
                border-right: 0;
                border-left: 0;
                border-bottom: 1px solid #999;
                outline: none;
                background: transparent;
            }
            .submit-btn{
                width: 80%;
                padding: 10px 30px;
                display: block;
                margin-top: 10px;
                background: linear-gradient(to right, #ff105f,#ffad06);
                border:0;
                outline: none;
                border-radius: 30px;
            }
            .check-box{
                margin: 30px 10px 30px 0;
            }
            span{
             color:#777;
             font-size: 12px;
             bottom:58px;
             margin-left:500px;   
            }
        </style>
</head>
<body>
<div class="hero">
    <div class="form-box">
        <div class="button-box">
          <div id="btn"></div>
          <button type="button" class="toggle-btn">Log In</button>
          <button type="button" class="toggle-btn">Register</button>
        </div>
        <div class="social-icons">
          <img class="logoo" src="./icons/Csports/logo 1/Csports-logos_black.png" width="60" height="60">
          <img class="logoo" src="./icons/Csports/logo 1/Csports-logos_black.png" width="60" height="60">
          <img class="logoo" src="./icons/Csports/logo 1/Csports-logos_black.png" width="60" height="60">
        </div>
        <form class="input-group">
            <input type="text" class="input-field" placeholder="User ID..." required>
            <input type="password" class="input-field" placeholder="Password..." required>
            <input type="password" class="input-field" placeholder="Password..." required>
            <button type="submit" class="submit-btn">Login</button>
        </form>
    </div>
    
  </div>
</div>

</body>
</html> -->
