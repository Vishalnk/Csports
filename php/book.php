<?php
include ("../php/top_for_final.php");
include ("../php/mail.php");
include ("../php/links.php");
    $price=$_POST['amt_text'];
    foreach($_SESSION['bookdetails'] as $key=>$value){
        $sname=$value['sport_name'];
        $cname=$value['court_name'];
    }
    $sel="select price from sports where sport='$sname' and cname='$cname'";
    $que=mysqli_query($conn,$sel);
    $res=mysqli_fetch_array($que);
    $p_count=1;
    $q_count=0;
    if($price<$res[0]){
        $_SESSION['pricedetails'][0]=array('price'=>$price,'answer'=>"$p_count");
    }
    else{
        $_SESSION['pricedetails'][0]=array('price'=>$price,'answer'=>"$q_count");
    }
    // else{
    //     $_SESSION['pricedetails']=array('price'=>$price,'answer'=>"0");
    // }
?>

<html>
<head>
    <link rel="stylesheet" href="../css/book.css">
</head>    
<body>
    <div id="book_div" class="modall book_div">
        <!-- <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span> -->
        <form class="modal-content" >
            <div id="container" class="container">
            <h1>OTP successfully sent to your registered mail ID!</h1><br><br><br>
            <h4>Please enter the OTP to confirm your booking order:</h4><br>
            <input id="inpt" class="inp" type="number" /><br><br>
            <p id="p"></p>
            <p id="succ" class="abc">If you haven't received mail from CSPORTS, kindly enusre that your MAIL ID is valid!</p>
            <p  id="succc" class="abc">Go to MY PROFILE -> UPDATE MAIL ID...</p>
            <div class="clearfix">
                <button type="button" onclick="check()" class="confirmbtn">CONFIRM BOOKING</button>
            </div>
            </div>
        </form>
    </div>

    <script>
        var otp=<?php echo $otp; ?>
        
        function check(){
                var inp=document.getElementById("inpt").value;
                // document.getElementById("p").innerHTML=inp;
                // alert(otp);
                // alert(inp);
                if (otp==inp){
                    document.getElementById("inpt").value="";
                    document.getElementById("succc").innerHTML="";
                    document.getElementById("succ").innerHTML="SUCCESS!";
                    document.getElementById("container").style.boxShadow ="0 0 10px green,0 0 40px green, 0 0 80px green  ";
                    setTimeout("location.href = '../php/redirect.php';", 2000);
                }
                else{
                    document.getElementById("p").innerHTML="Invalid OTP!";
                    document.getElementById("inpt").value="";
                    document.getElementById("container").style.boxShadow ="0 0 10px rgb(158, 50, 50),0 0 40px rgb(158, 50, 50), 0 0 80px rgb(158, 50, 50)  ";
                }

        }
        // function home(){
        //     window.location.assign("../php/user_page.php");
        // }
        // var modal = document.getElementById('book_div');
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }
    </script>
    
</body>
</html>