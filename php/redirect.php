<?php
include ("../php/DBconnection.php");
include ("../php/links.php");
session_start();
foreach($_SESSION['userdetails'] as $key=>$value){
    $name=$value['username'];
    $pass=$value['userpass'];
    $mail=$value['usermail'];
}
foreach($_SESSION['timedetails'] as $key=>$value){
    $time=$value['time'];
}
foreach($_SESSION['pricedetails'] as $key=>$value){
  $answer=$value['answer'];
  $price=$value['price'];
}
foreach($_SESSION['bookdetails'] as $key=>$value){
    $sname=$value['sport_name'];
    $cname=$value['court_name'];
    $date=$value['date'];
}
if($answer=="1"){
  $sqll="update register set points='0' where name='$name' and mail='$mail'";
  $queryy=mysqli_query($conn,$sqll);
}

$ssel="select points from register where name='$name' and mail='$mail'";
$qque=mysqli_query($conn,$ssel);
$rres=mysqli_fetch_array($qque);
$point=2;
$point=$point+$rres[0];
$sqll="update register set points='$point' where name='$name' and mail='$mail'";
$queryy=mysqli_query($conn,$sqll);
$sql="insert into booking (cname,date,time,user,sport_type,price) values('$cname','$date','$time','$name','$sname','$price')";
$query=mysqli_query($conn,$sql);
if($query){
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
                        <h5 class="modal-title">BOOKING SUCCESSFUL </h5><i class="fas fa-volleyball-ball"></i>
                    </div>
                    <div class="modal-body">
                        <p>You have earned 2 POINTS on this booking! <br><br><i class='fas fa-coins'></i> &nbsp;<i class='fas fa-coins'></i><br><br></p>
                        <br>
                        <p>Great going! Have a energetic day!</p>
                        
                    </div>
                    </div>
                </div>
                </div>
            </body>
          </html>
    <?php
    header("refresh:2; url=../php/user_page.php");
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
                <h5 class="modal-title"> X   &nbsp;&nbsp;&nbsp;DATABASE ERROR  &nbsp;&nbsp;&nbsp; X </h5><i class="fas fa-volleyball-ball"></i>
            </div>
            <div class="modal-body">
                <p>Sorry for the inconvenience, there was a server error. Please try again later! </p>
                
            </div>
            </div>
        </div>
        </div>
    </body>
  </html>
  <?php 
  header("refresh:2; url=../user_page.php");
}
$sql1="insert into booking_record (cname,date,time,user,sport_type,price) values('$cname','$date','$time','$name','$sname','$price')";
$query1=mysqli_query($conn,$sql1);
?>


<html>
<head>
    <style>
        body .fade{
            display:block;
        }
    </style>
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- <div id="book_div" class="modall book_div">
        <form class="modal-content" action="/action_page.php">
            <div id="container" class="container">
            <h1>OTP successfully sent to your registered mail ID!</h1><br><br><br>
            <h4>Please enter the OTP to confirm your booking order:</h4><br>
            <input id="inpt" class="inp" type="number" /><br><br>
            <div class="clearfix">
                <button type="button" onclick="check()" class="confirmbtn">CONFIRM BOOKING</button>
            </div>
            </div>
        </form>
    </div> -->
</body>
</html>
