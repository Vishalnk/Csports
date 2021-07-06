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
            <title>Csports/User Profile</title>
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
                <a class="a" id="activity" href="my_activity.php">My Activities</a> 
                <a href="" class="fas volley">&#xf45f;</a>
                <a class="a" id="point_hold" href="points_holder.php">Top points holders</a> 
                <a href="" class="fa trophy fa-trophy"></a>
                <a class="home" id="home" href="#" onclick="home()">Home</a> 
                <a href="" class="fa home_icon fa-home "></a>
                <a class="booking" id="booking" href="#" onclick="document.getElementById('id01').style.display='block'">Cancel</a> 
                <a href="" class="fa fa-close book_ico"></a>
            </div>
            <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                <form class="modal-content" action="/action_page.php">
                    <div class="container">
                    <h1>Clear Selection</h1>
                    <p>Are you sure you want to clear your selection?</p>
                    
                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">NO</button>
                        <button type="button" onclick="window.location.assign('../php/user_page.php');" class="deletebtn">YES</button>
                    </div>
                    </div>
                </form>
            </div>

            <script>
                function home(){
                    window.location.assign("../php/user_page.php");
                }
                var modal = document.getElementById('id01');
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
        </body>
        </html>
        <?php
            }
        ?>