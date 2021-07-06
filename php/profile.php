<?php
include  "../php/user_page_top.php";
include 'DBconnection.php';
foreach($_SESSION['userdetails'] as $key=>$value){
    $name=$value['username'];
    $points=$value['points'];
    $mail=$value['usermail'];
}
$sel="select * from booking_record where user='$name'";
$que=mysqli_query($conn,$sel);
$coun=mysqli_num_rows($que);
$sel1="select * from booking where user='$name'";
$que1=mysqli_query($conn,$sel1);
$coun1=mysqli_num_rows($que1);
?>

<html>
<head>
    <style>
        .con{
            /* border:2px solid black; */
            /* background-color:#339E66FF; */
            width:50%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-image: linear-gradient(to bottom right,#077b8a,#a2d5c6);
            transform:translate(5%,15%);
            padding:20px 20px 50px 20px;
        }
        .con i{
            float:right;
            color:gold;
            animation: spin 3s linear infinite;
            transition:ease;
            font-size: 30px;
        }
        .con .in{
            text-align:center;
            /* border:2px solid black; */
            width:70%;
            padding:20px 0;
            line-height:200%;
        }
        @keyframes spin {
            0% { transform: rotate(0deg);
            color:pink; }
            100% { transform: rotate(360deg); 
            color:blue;}
            }
        .con h2{
            float:left;
            color:brown;
            margin-left:30%;
        }
        .pass{
            /* border:2px solid black; */
            width:50%;
            padding:30px;
            /* background-color:#4B878BFF; */
            background-image: linear-gradient(to bottom right,#077b8a,#a2d5c6);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transform:translate(5%,15%);
        }
        .mail{
            /* border:2px solid black; */
            width:50%;
            margin:50px 20% 150px 25%;
            padding:30px;
            /* background-color:#4B878BFF; */
            background-image: linear-gradient(to bottom right,#077b8a,#a2d5c6);
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transform:translate(5%,15%);
        }
        .mail h3{
            padding-bottom:40px;
        }
        .pass h3,.mail h3{
            margin-left:30%;
            color:brown;
        }
        .in .l2{
            color:darkblue;
            font-weight:500;
        }
        .pass label,.mail label{
            color:darkblue;
            font-size:20px;
            font-weight:500;
        }
        .submit_btn{
            float:right;
            color:white;
            padding:5px 10px;
            border-radius: 5px;
            /* transition: 1s ease; */
            text-decoration: none;
            cursor: pointer;
            border:2px solid coral;
            background-color: forestgreen;
        }
        .submit_btn:hover{
            color: forestgreen;
            border:2px solid black;
            background-color:white;
            font-weight: 500;
        }
        .in .l1{
            color:green;
            font-size:23px;
        }
        
    </style>
</head>
<body>
<div class="con container-fluid">
    <h2>USER PROFILE</h2><i class="fas fa-volleyball-ball"></i> <br><br>
    <div class="in container-fluid">
        <label class="l2">USER NAME:&nbsp;&nbsp;&nbsp;&nbsp; </label><label class="l1"><?php echo $name;?><br></label><br>
        <label class="l2">TOTAL POINTS EARNED:&nbsp;&nbsp;&nbsp;&nbsp; </label><label class="l1"><?php echo $points;?></label><br>
        <label class="l2">NUMBER OF BOOKINGS TILL DATE:&nbsp;&nbsp;&nbsp;&nbsp; </label><label class="l1"><?php echo $coun;?>nos.</label><br>
        <label class="l2">YET TO BE PLAYED:&nbsp;&nbsp;&nbsp;&nbsp; </label><label class="l1"><?php echo $coun1;?>nos.</label><br>
        <label class="l2">USER PASSWORD:&nbsp;&nbsp;&nbsp;&nbsp; </label><label class="l1">***********</label><br>
        <label class="l2">USER MAIL ID:&nbsp;&nbsp;&nbsp;&nbsp; </label><label class="l1"><?php echo $mail;?></label>
    </div>
</div>
<br><br><br>
<div class="pass container-fluid">
    <h3>MAIL ID UPDATE</h3><br><br>
    <form class="regform" action="../php/mail_update.php" method="POST">
        <label>Enter you new MAIL ID:</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" class="input-field" name="newmail" placeholder="mail Id..." required autocomplete="off"/><br><br>
        <input type="submit" class="submit_btn" value="UPDATE" id="btnn">
    </form>
</div> 
<br>
<div class="mail container-fluid">
    <h3>PASSWORD UPDATE</h3>
    <form class="regform" action="../php/pass_update.php" method="POST">
        <label>Enter your old password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" class="input-field" name="oldpass"  required /><br><br>
        <label>Enter your new password:</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" class="input-field" name="newpass"  required /><br><br>
        <input type="submit" class="submit_btn" value="UPDATE" id="btnn">
    </form>
</div>  
</body>
</html>