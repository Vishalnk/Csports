<?php
// session_start();
foreach($_SESSION['userdetails'] as $key=>$value){
    $name=$value['username'];
    $pass=$value['userpass'];
    $mail=$value['usermail'];
}
foreach($_SESSION['timedetails'] as $key=>$value){
    $time=$value['time'];
}
foreach($_SESSION['bookdetails'] as $key=>$value){
    $sname=$value['sport_name'];
    $cname=$value['court_name'];
    $date=$value['date'];
}
include 'DBconnection.php';

$sell="select price from sports where sport='$sname' and cname='$cname'";
$quee=mysqli_query($conn,$sell);
$ress=mysqli_fetch_array($quee);

$sel="select mail from register where name='$name' and password='$pass'";
$que=mysqli_query($conn,$sel);
$coun=mysqli_num_rows($que);
$res=mysqli_fetch_array($que);
$otp=rand(100000,999999);
$message="We have received your request for booking:"." \r\n ".
"Sports Type:".$sname." \r\n ".
"Time:".$time." \r\n ".
"Venue/Court:".$cname." \r\n ".
"Date:".$date." \r\n ".
"Price:".$ress[0]."-/ (This is the actual price. If you have claimed points, it will be reflected in your status soon) \r\n \r\n \r\n \r\n \r\n ".
"Enter this OTP to confirm booking:  ".$otp;
mail($mail, 'Hello '.$name.',', $message,'From:csportsofficial7@gmail.com')


// if(mail("vishalnk1999@gmail.com", 'Hello'.$name.',', $message,'From:csportsofficial7@gmail.com')){
// 	echo "sent mail";
// }
// else{
// 	echo "mail not sent";
// }

?>
