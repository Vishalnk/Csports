<?php
    include 'top_for_points_holder.php';
    include 'links.php';
    include 'DBconnection.php';
    foreach($_SESSION['userdetails'] as $key=>$value){
        $name=$value['username'];
        $pass=$value['userpass'];
    }
    $sel="select * from booking where user='$name' order by date ASC";
    $que=mysqli_query($conn,$sel);
    $count=mysqli_num_rows($que);

    $sel1="select * from booking_record where user='$name' order by date ASC";
    $que1=mysqli_query($conn,$sel1);
    $count1=mysqli_num_rows($que1);
?>
<html>
<head>
<style>
    .container-fluid{
        /* border:2px solid black; */
        width:50%;
        margin-top:20px;
        float:left;
    }
    .container-fluid p{
        margin-left:10px;
    }
    .container-fluid h3{
        margin-top:30px;
        color:darkblue;
        text-align:center;
    }
    .con{
        /* border:2px solid red; */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-left:15%;
        margin-bottom:10px;
        width:70%;
        padding:5px;
    }
    .con .stype{
        float:left;
        font-size:20px;
        color:navy;
        font-weight:500;
    }
    .con .days{
        background-color:green;
        padding:5px;
        float:right;
        margin-top:-20px;
        color:white;
    }
    .con .odays{
        background-color:red;
        padding:5px;
        float:right;
        margin-top:-20px;
        color:white;
    }
    /* .outer{
        border-right: 2px solid red;
        border-right: 2px solid red;
    } */

</style>
</head>
<body>
<div class="outer container-fluid">
  <h3>Upcoming Events</h3>
  <?php 
   while($res=mysqli_fetch_array($que)){
       $time=(int)$res[2]+1;
       if(($time-1)==8 or ($time-1)==9 or ($time-1)==10 ){
           $str="am";
       }
       else{
           $str="pm";
       }
       $cur_date=date("Y-m-d");
        $a1=strtotime($cur_date);
        $timee=$res[1];
        $a2=strtotime($timee);
        $result=($a2-$a1)/60/60/24;
    ?>
        <div class="con container-fluid">
            <p class="stype"><?php echo $res[4]?></p><br>
            <p class="days"><?php echo $result?> Days To go</p><br>
            <p><?php echo $res[0]?></p>
            <p><?php echo $res[1]?> </p>
            <p><?php echo $res[2]?>-<?php echo $time.$str?></p>
            <p>Rs.<?php echo $res[5]?> </p>
            
        </div>
    <?php
    }
  
  ?>
  
</div>
<div class="outer container-fluid">
  <h3>Booking History</h3>
  <?php 
   while($res1=mysqli_fetch_array($que1)){
       $time1=(int)$res1[2]+1;
       if($time1==8 or $time1==9 or $time1==10 ){
           $str1="am";
       }
       else{
           $str1="pm";
       }
       $cur_date1=date("Y-m-d");
        $a11=strtotime($cur_date1);
        $timee1=$res1[1];
        $a21=strtotime($timee1);
        $result1=($a21-$a11)/60/60/24;
        if($result1<0){
            $result1=0;
        ?>
        <div class="con container-fluid">
            <p class="stype"><?php echo $res1[4]?></p><br>
            <p class="odays">Expired!</p><br>
            <p><?php echo $res1[0]?></p>
            <p><?php echo $res1[1]?> </p>
            <p><?php echo $res1[2]?>-<?php echo $time1.$str1?></p>
            <p>Rs.<?php echo $res1[5]?> </p>
            
        </div>
        <?php
        }
        else{
            ?>
            <div class="con container-fluid">
                <p class="stype"><?php echo $res1[4]?></p><br>
                <p class="days"><?php echo $result1?> Days To go</p><br>
                <p><?php echo $res1[0]?></p>
                <p><?php echo $res1[1]?> </p>
                <p><?php echo $res1[2]?>-<?php echo $time1.$str1?></p>
                <p>Rs.<?php echo $res1[5]?> </p>
            
            </div>
            <?php

        }
    ?>
    <?php
    }
  ?>
</div>
</body>
</html>