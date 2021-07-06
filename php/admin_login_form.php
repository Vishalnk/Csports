<?php
include ("../php/links.php");
?>
<html>
<head>
    <link rel="stylesheet" href="../php/admin_login_form.css">    
</head>
<body>
    <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ADMIN LOGIN </h5><i class="fas fa-volleyball-ball"></i>
        </div>
        <form class="regform" action="../php/admin_login.php" method="POST">
            <input type="text" class="input-field" name="namee" placeholder="Admin Id..." required autocomplete="off" /><br>
            <input type="password" class="input-field" name="passs" placeholder="Password..." required /><br>
            <!-- <input type="number" id="otp" class="input-field" name="otp" placeholder="Enter the OTP sent to your mail" required /><br> -->
            <input type="submit" class="submit_btn" value="LOGIN " id="btnn">
        </form>
        </div>
    </div>
    </div>
</body>
</html>