<?php 
include ("../php/top_for_final.php");
include 'DBconnection.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        if(isset($_POST['final'])){
                $_SESSION['timedetails'][1]=array('time'=>$_POST['select']);
                foreach($_SESSION['timedetails'] as $key=>$value){
                    $time=$value['time'];
                }
                foreach($_SESSION['bookdetails'] as $key=>$value){
                    $sname=$value['sport_name'];
                    $cname=$value['court_name'];
                    $date=$value['date'];
                }
                foreach($_SESSION['userdetails'] as $key=>$value){
                    $username=$value['username'];
                }
                $point_sel="select points from register where name='$name' and password='$pass'";
                $point_que=mysqli_query($conn,$point_sel);
                $point_res=mysqli_fetch_array($point_que);

            if ($time==8 || $time==9 || $time==10 || $time==11 ){
                $ext="am";
            }
            else{
                $ext="pm";    
            }
            $sel="select price from sports where sport='$sname' and cname='$cname'";
            $que=mysqli_query($conn,$sel);
            $res=mysqli_fetch_array($que);
            
        }
        else{
            echo "Button click error!";
        }
    }
    else{
        echo "POST method error!";
    }
?>
<html>
<head>
<link rel="stylesheet" href="../css/final.css">

</head>
<body>
    
    <div id="bill" class="bill">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
        <form class="bill-content" action="../php/book.php" method=POST>
            <div class="container">
                <h1>Booking Confirmation</h1>
            <div class="main">
                <p> <span>Sports Type:</span> <?php echo $sname?></p>
                <p><span>Time:</span> <?php echo $time?>:00 - <?php echo $time+1?>:00 <?php echo $ext?></p>
                <p> <span>Venue/Court: </span> <?php echo $cname?></p>
                <p> <span>Date:</span> <?php echo $date?></p>
                <!-- <p> <span>Price:</span> <?php echo $res[0]?>/- (Pay at venue)</p> -->
                <p><span>Do you want to want to use your points to claim discount?</span></p>
                <input type="radio" name="rad" class="rad1" value="yes" onclick="cal();"/>YES
                <input type="radio" name="rad" class="rad2" value="no" onclick="cal();"/>NO
                <p class="price"><span>Price:</span><input type="text" id="amt_text" name="amt_text" class="amt_text" onfocus = "this.blur();"  required /></p>
                <!-- <p id="para">s</p> -->
                <!-- <input type="submit" onclick="cal()" class="amt_but"> -->
            </div>
            <div class="sentence">
            <p><span><?php echo $username?>,</span> if the above details for your booking is right, kindly confirm booking order!</p>
            </div>
            <div class="clearfix">
                <button type="submit" onclick="" class="btn-success">Place Order</button>
            </div>
            </div>
        </form>
    </div>
    <script>
        function cal(){
            var opt=document.getElementsByName("rad");
            if (opt[0].checked){
                document.getElementById("amt_text").value="<?php echo ($res[0]-$point_res[0]/2)?>";
                // var abc=document.getElementById("amt_text").value;
                // document.getElementById("para").innerHTML=abc;
            }
            else if (opt[1].checked){
                document.getElementById("amt_text").value="<?php echo $res[0]?>";
                // var abc=document.getElementById("amt_text").value;
                // document.getElementById("para").innerHTML=abc;
            }
            else{
                document.getElementById("amt_text").value="<?php echo $res[0]?>";
            }
            
        }
        
    </script>
</body>
</html>