<?php

    include ("../php/user_page_top.php");
    // session_start();
    foreach($_SESSION['userdetails'] as $key=>$value){
        $username=$value['username'];
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        if(isset($_POST['sport_but'])){

            // if(isset($_SESSION['userdetails'])){

            // }
            // else{
                $_SESSION['bookdetails'][1]=array('sport_name'=>$_POST['sname'],'usrname'=>$username,'court_name'=>$_POST['choice'],'date'=>$_POST['dat']);
                // print_r($_SESSION['bookdetails']);
                foreach($_SESSION['bookdetails'] as $key=>$value){
                    $date=$value['date'];
                    $court=$value['court_name'];
                    $sportname=$value['sport_name'];
                }
                // print_r($date);
                // print_r($court);
            // }

        }
        else{
            echo "Button click error!";
        }
    }
    else{
        echo "POST method error!";
    }
    // print_r($date);
    // print_r($court);

    $std_time=array(8,9,10,11,12,1,2,3,4,5,6,7);
    // $br=[];
    $cur_date=date("Y-m-d");
    if($date<$cur_date or $court==""){
        echo "not valid date";
        ?>
        <script>
            alert("INVALID DETAILS");
            window.location.assign("../php/user_page.php")
        </script>
        <?php 
    }
    else{
            $sel="select time,user from booking where cname='$court' and date='$date'";
            $query=mysqli_query($conn,$sel);
            $count=mysqli_num_rows($query);
            $samp=array();
            $j=0;
            while($result=mysqli_fetch_array($query)){
                $samp[$j]=$result[0];
                $j++;
            }
            
            $resultt = array_diff($std_time, $samp);
            $final=array_values(array_filter($resultt));
            ?>
            <html>
                <head>
                    <link rel="stylesheet" href="../css/time_form.css">
                </head>
                <body>
                    <div class="main">
                        <h2><?php echo $sportname?></h2>
                        <p><span><?php echo $username?>,</span> <br>as per your request for booking court/venue in <span><?php echo $court?></span> on <span><?php echo $date?></span>, following are the time slots available:  </p>
                        <br>
                        <form action="../php/final.php" method="POST">
                                <?php   
                                if($count>0){
                                    ?><select class="select" id="select" name="select"  onchange="cc()" onkeyup="cc()"><?php
                                    for($i=0;$i<count($final);$i++){
                                            if($final[$i]==8 || $final[$i]==9 || $final[$i]==10 || $final[$i]==11){
                                                $sym="am";
                                            }
                                            else{
                                                $sym="pm";
                                            }
                                            ?>
                                            <option  name="choice" value="<?php echo $final[$i]?>"><?php echo $final[$i]?>:00 <?php echo $sym?></option>
                                            <?php
                                    }
                                    ?>
                                    </select>
                                    <?php 
                                }
                                else{
                                    ?>
                                    <select class="select" id="select" name="select"  onchange="cc()" onkeyup="cc()"><?php echo"sd";
                                    for($i=0;$i<count($std_time);$i++){
                                        if($std_time[$i]==8 || $std_time[$i]==9 || $std_time[$i]==10 || $std_time[$i]==11){
                                            $sym="am";
                                        }
                                        else{
                                            $sym="pm";
                                        }
                                        ?>
                                        <option  class="option" name="choice" value="<?php echo $std_time[$i]?>"><?php echo $std_time[$i]?>:00 <?php echo $sym?></option>
                                        <?php
                                    }
                                }
                                ?>
                                <input type="text" class="choice_txt" id="txt" name="choicee" onfocus = "this.blur();" required />
                                <button type="submit" class="final" name="final" >Proceed To Book</button>
                        </form>
                    </div>
                    <script>
                            function cc(){
                                var y = document.getElementById("select").value;
                                document.getElementById("txt").value="Selected time:   "+y+":00";
                            }
                    </script>
                </body>
            </html>
        <?php
    }?>
    

