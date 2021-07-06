<?php
    session_start();
    if(!isset($_SESSION['userdetails'])){
        echo "login please";
        header("refresh:1; url=../front_page.php");
    }
    else{
        include 'DBconnection.php';
        foreach($_SESSION['userdetails'] as $key=>$value){
            $name=$value['username'];
            $pass=$value['userpass'];
        }
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
            <link rel="stylesheet" href="../css/user_page.css">
            
        </head>
        <body >
            <div class="mynav">
                <img src="../icons/Csports/logo 5/Csports-logos_white.png" alt="logo" width="160" height="60">
                <h3>Welcome, <?php echo $name ?></h3>
                <p class="point" id="aa" >Your current points: <?php echo $res[0] ?>&nbsp;&nbsp;<i class="fas fa-coins"></i></p><br>
                <a class="logg" href="logout.php">Logout</a>
            </div>
            <div class="menu">
                <a class="profilee" id="activity" href="profile.php">My Profile</a> 
                <a href="#" class="fa user fa-user"></a>
                <a class="act" id="activity" href="my_activity.php">My Activities</a> 
                <a href="" class="fas volley fa-volleyball">&#xf45f;</a>
                <a class="pointt" id="point_hold" href="points_holder.php">Top points holders</a> 
                <a href="" class="fa trophy fa-trophy"></a>
                <a class="home" id="home" href="#" onclick="show_div1()">Home</a> 
                <a href="" class="fa home_icon fa-home "></a>
                <a class="booking" id="booking" href="#" onclick="show_div2()">Book</a> 
                <a href="" class="fa fa-ticket book_ico"></a>
                
            </div>
            
            <div class="home_div" id="div1">
                <div class="one">
                    <h2><span>T</span>hings <span>Y</span>ou <span>C</span>an <span>E</span>xplore!!!</h2>
                    <h3><video width="350" height="350" controls autoplay loop>
                        <source src="../icons/home_poster.mp4" type="video/mp4">
                        </video>
                    </h3>
                    <div class="one_text">
                        <p class="p1"><span>B</span>ook. <span>M</span>eet. <span>P</span>lay. <span>R</span>epeat. </p>
                        <p class="p2"><br><i class="fas fa-basketball-ball"></i>&nbsp;BOOK courts for your favourite sports, gather friends and strangers...<br><i class="fas fa-basketball-ball"></i>&nbsp; CONNECT with all...<br><i class="fas fa-basketball-ball"></i>&nbsp; ACE your game...<br><i class="fas fa-basketball-ball"></i>&nbsp; finally REPEAT 
                        <a class="home" href="#" onclick="show_div2()" >Book Now </a>    </p>
                        <!--  -->
                    </div>
                </div>
                <div class="two">
                        <h2><video width="350" height="350" controls autoplay loop>
                            <source src="../icons/home_poster2.mp4" type="video/mp4">
                            </video>
                        </h2>
                        <div class="two_text">
                            <p class="p3"><span>B</span>ook, <span>G</span>et <span>P</span>oints... <span>A</span>vail <span>D</span>iscounts... </p>
                            <p class="p4">Have you booked your first game?<br>
                            If NO, you are missing out on gaining points<br> on each booking from which you can claim discounts... </p>
                        </div>
                </div>
                <div class="three">
                        <h2><video width="300" height="400" controls autoplay loop>
                            <source src="../icons/home_poster3.mp4" type="video/mp4">
                            </video>
                        </h2>
                        <div class="three_text">
                            <p class="p5"><span>T</span>op <span>P</span>erformers </p>
                            <p class="p6"> Stop for a minute and have a quick glance at the <a class="point_link" href="points_holder.php">POINTS TABLE</a> to see if you are leading. Kudos great Going!!! </p>
                        </div>
                </div>
            </div>
            
            <!-- start-->
            <div class="sports_div" id="div2"> 
                <div class="sub_sport_div" id="sub_sport_div">
                    <a class="B" id="BA" href="#" onclick="badminton()">BADMINTON <img src="../icons/shuttle.png" alt="logo" width="40" height="40"></a>
                    <a class="F" id="FO" href="#" onclick="football()">FOOTBALL<i class='fas foot fa-futbol'></i></a> 
                    <a class="S" id="SW" href="#" onclick="swimming()">SWIMMING <i class='fas swim fa-swimmer'></i></a> 
                </div>

                <div class="badminton" id="badminton">
                    <?php  
                        $bd_sel="select cname from sports where sport='badminton'";
                        $bd_que=mysqli_query($conn,$bd_sel);
                    ?>
                    <form  action="../php/time_form.php" method="POST">
                        <div class="date_div">
                            <label class="label1">Select date:</label><br>
                            <input class="date_input" type="date" id="dat" name="dat"><br>
                        </div>
                        <div class="venue_div">
                            <label class="label2">Select Venue/Court:</label><br>
                                <select id="bd" name="bd"  class="select" onchange="foott()" onkeyup="foott()">
                                <?php
                                    while($bd_res=mysqli_fetch_array($bd_que)){
                                        ?>
                                            <option class="options" name="choice" value="<?php echo $bd_res[0]?>"><?php echo $bd_res[0]?></option>
                                        <?php
                                    }
                                ?>
                                </select><br>
                            <input type="text" class="options_input" id="txt" name="choice" onfocus = "this.blur();" /><br>
                        </div>
                        
                        <button type="submit" class="next_but" name="sport_but" >Submit</button>
                        <input type="hidden" name="sname" value="BADMINTON" />
                    </form>

                    <!-- <input type="button" value="Proceed" onclick="bt_proceed()"/> -->
                </div>
                <div class="football" id="football">
                <?php  
                        $fbd_sel="select cname from sports where sport='football'";
                        $fbd_que=mysqli_query($conn,$fbd_sel);
                    ?>
                    <form  action="../php/time_form.php" method="POST">
                        <div class="date_div">
                            <label class="flabel1">Select date:</label><br>
                            <input class="fdate_input" type="date" id="dat" name="dat"><br>
                        </div>
                        <div class="venue_div">
                            <label class="flabel2">Select Venue/Court:</label><br>
                                <select id="fbd" name="bd"  class="fselect" onchange="ffoott()" onkeyup="ffoott()">
                                <?php
                                    while($fbd_res=mysqli_fetch_array($fbd_que)){
                                        ?>
                                            <option class="foptions" name="choice" value="<?php echo $fbd_res[0]?>"><?php echo $fbd_res[0]?></option>
                                        <?php
                                    }
                                ?>
                                </select><br>
                            <input type="text" class="foptions_input" id="ftxt" name="choice" onfocus = "this.blur();" /><br>
                        </div>
                        
                        <button type="submit" class="next_but" name="sport_but" >Submit</button>
                        <input type="hidden" name="sname" value="FOOTBALL" />
                    </form>

                </div>
                <div class="swimming" id="swimming">
                    <?php  
                            $sbd_sel="select cname from sports where sport='swimming'";
                            $sbd_que=mysqli_query($conn,$sbd_sel);
                        ?>
                    <form  action="../php/time_form.php" method="POST">
                        <div class="date_div">
                            <label class="slabel1">Select date:</label><br>
                            <input class="sdate_input" type="date" id="dat" name="dat"><br>
                        </div>
                        <div class="venue_div">
                            <label class="slabel2">Select Venue/Court:</label><br>
                                <select id="sbd" name="bd"  class="sselect" onchange="sfoott()" onkeyup="sfoott()">
                                <?php
                                    while($sbd_res=mysqli_fetch_array($sbd_que)){
                                        ?>
                                            <option class="soptions" name="choice" value="<?php echo $sbd_res[0]?>"><?php echo $sbd_res[0]?></option>
                                        <?php
                                    }
                                ?>
                                </select><br>
                            <input type="text" class="soptions_input" id="stxt" name="choice" onfocus = "this.blur();"/><br>
                        </div>
                        
                        <button type="submit" class="next_but" name="sport_but" >Submit</button>
                        <input type="hidden" name="sname" value="SWIMMING" />
                    </form>
                </div>
           
            </div>
            
            <!-- end-->
            <script>
                function badminton(){
                    document.getElementById("badminton").style.display="block";
                    document.getElementById("badminton").style.transition=" all 2s";
                    document.getElementById("football").style.display="none";
                    document.getElementById("FO").style.display="none";
                    document.getElementById("BA").style.transition = "all 2s";
                    document.getElementById("BA").style.marginLeft = "40%";
                    document.getElementById("SW").style.display="none";
                    document.getElementById("swimming").style.display="none";
                    document.getElementById("sub_sport_div").style.marginTop = "40px";
                }
                function football(){
                    document.getElementById("badminton").style.display="none";
                    document.getElementById("football").style.display="block";
                    document.getElementById("swimming").style.display="none";
                    document.getElementById("BA").style.display="none";
                    document.getElementById("FO").style.transition = "all 2s";
                    document.getElementById("FO").style.marginLeft = "40%";
                    document.getElementById("SW").style.display="none";
                    document.getElementById("sub_sport_div").style.marginTop = "40px";
                }
                function swimming(){
                    document.getElementById("badminton").style.display="none";
                    document.getElementById("football").style.display="none";
                    document.getElementById("swimming").style.display="block";
                    document.getElementById("BA").style.display="none";
                    document.getElementById("SW").style.transition = "all 2s";
                    document.getElementById("SW").style.marginLeft = "40%";
                    document.getElementById("FO").style.display="none";
                    document.getElementById("sub_sport_div").style.marginTop = "40px";
                }
                function foott(){
                    var y = document.getElementById("bd").value;
                    document.getElementById("txt").value=y;
                }
                function ffoott(){
                    var y = document.getElementById("fbd").value;
                    document.getElementById("ftxt").value=y;
                }
                function sfoott(){
                    var y = document.getElementById("sbd").value;
                    document.getElementById("stxt").value=y;
                }
                
                function bookcourt(){
                    document.getElementById("book").style.marginLeft="0px";
                    document.getElementById("book").style.transform="rotate(0deg)";
                    document.getElementById("book").style.height="150px";
                    document.getElementById("book").style.width="150px";
                    document.getElementById("book").style.fontSize="20px";
                    document.getElementById("div2").style.display="none";
                    // document.getElementById("aa").innerHTML="<html>";
                }
                function show_div1(){
                    document.getElementById("div1").style.display="block";
                    document.getElementById("div2").style.display="none";
                    document.getElementById("home").style.color="red";
                    document.getElementById("booking").style.color="white";
                    document.getElementById("point_hold").style.color="white";
                    document.getElementById("activity").style.color="white";
                    // document.getElementById("aa").innerHTML="<html>";
                }
                function show_div2(){
                    document.getElementById("div2").style.display="block"
                    document.getElementById("div1").style.display="none"
                    document.getElementById("booking").style.color="red";
                    document.getElementById("home").style.color="white";
                    document.getElementById("point_hold").style.color="white";
                    document.getElementById("activity").style.color="white";
                    // document.getElementById("SW").style.display="inline";
                    // document.getElementById("BA").style.display="inline";
                    // document.getElementById("FO").style.display="inline";
                    // document.getElementById("aa").innerHTML="<html>";
                }
        
            </script>
        </body>
        </html>
    <?php    
    }
    
    
?>

