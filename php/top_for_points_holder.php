<?php
    session_start();
    if(!isset($_SESSION['userdetails'])){
        echo "login please";
        header("refresh:1; url=../front_page.php");
    }
    else{
        foreach($_SESSION['userdetails'] as $key=>$value){
            $name=$value['username'];
            $pass=$value['userpass'];
        }
        include 'DBconnection.php';
        $sel="select points from register where name='$name' and password='$pass'";
        $que=mysqli_query($conn,$sel);
        $coun=mysqli_num_rows($que);
        $res=mysqli_fetch_array($que);
        include 'links.php';
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Points Table</title>
            <link rel="stylesheet" href="../css/top_for_final.css">
        </head>
        <body >
            <div class="mynav">
                <img src="../icons/Csports/logo 5/Csports-logos_white.png" alt="logo" width="160" height="60">
                <h3>Welcome, <?php echo $name ?></h3>
                <p class="point" id="aa" >Your current points: <?php echo $res[0] ?>&nbsp;&nbsp;<i class="fas fa-coins"></i></p><br>
                <a class="logg" href="logout.php">Logout</a>
            </div>
            <div class="menu">
                <a class="home" id="home" href="user_page.php" onclick="home()">Home</a> 
                <a href="" class="fa home_icon fa-home "></a>
                <a class="booking" id="booking" href="user_page.php" onclick="back()">Back</a> 
                <a href="" class="fa fa-arrow-left book_ico"></a>
            </div>

            <script>
                function home(){
                    window.location.assign("../php/user_page.php");
                }
                function back(){
                    window.location.assign("../php/user_page.php");
                }
                
                }
            </script>
        </body>
        </html>
        <?php
            }
        ?>