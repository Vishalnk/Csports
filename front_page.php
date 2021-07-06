<?php
include './php/DBconnection.php';
date_default_timezone_set('Asia/kolkata');
// echo date("h:i:s:a");
$cur_hour=date('h');
$cur_am_pm=date('a'); 
$cur_date=date('Y-m-d');
$times="delete from booking where date<'$cur_date'";
$time_query=mysqli_query($conn,$times);
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="./php/front_page.css">
  <title>Csports</title>
  <?php include './php/links.php';?>
</head>
<body >
<div class="mynav"><!--***************************-->
          <img src="./icons/Csports-logos_transparent.png" alt="logo" width="160" height="60">
          <a href="#login" class="btn b1">Register/Login</a>
          <a href="#about_us" class="btn b2">About Us</a>
          <a href="#contact" class="btn b3">Contact</a>
          <a href="./php/admin_login_form.php" class="btn b4">Admin</a>
        </div>
    <div class="main_div">
        
        <div class="carousel_div"><!--***************************-->
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="./icons/badmin.jpg" alt="First slide">
                <div class="first carousel-caption">
                  <h3 class="h3-responsive">Get yourself challenged for the best!</h3>
                  <pre>-SINGLES & DOUBLES Inter-Club championship
-SINGLES & DOUBLES Inter-State tournment
Venue: Gold Club Academy 
Starting from: 10am 23rd July 2021</pre>
                  <a href="#lin">READ MORE...</a>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="./icons/cycle.jpg" alt="Second slide">
                <div class="second carousel-caption ">
                  <h3>BOOST up your stamina for the week end GRAND TOUR ...<i class="fa fa-trophy"></i></h3>
                  <h5>Slide on text read...</h5>
                  <pre>Cyclers are requested to gather in the KANTEERVA STADIUM
on 23 July 2021 @ 7:00 am and the track details will be 
informed to you at the venue. For any queries kindly,
&#9742; 9023183948
&#x1F4E7; gclubgrandtour@gmail.com
</pre>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="./icons/cricket1.jpg" alt="Third slide">
              </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>          
              <div class="logo"><!--***************************-->
                      <img src="./icons/Csports-logos_transparentt.png" alt="logo" width="100" height="100">
              </div>
                <div class="container-fluid">
                  <div class="about_us_div" id="about_us">
                    <p class="heading">ABOUT US...</p>
                    <p class="heading_txt">CSPORTS is the leading One-Stop Sports website to help bring back Play in everyday lives. We empower local communities to make new playpals, organize playgroups, share information/experiences and discover sporting venues/activities. We are trying our best to bring the enthusiasm of sports in each and everyone. Keeping in our mind that sports can transform a person from a state of laziness to extremely fit and energetic, we have put in our best to help users connect to one an other and hence book slots and start playing...  So, no more excuses now...don your sneakers and be a Playoholic!</p>
                  </div>
                  <div class="about_img_div">
                    <img src="./icons/side.jpg" alt="logo">
                  </div>
                  <div class="row offer_div">
                    <p id="lin" class="offer">EVENTS & TOURNAMENTS!!!</p>
                    <div class="col-xs-12  col-md-6 col-lg-4 vid1">
                      <video controls autoplay loop>
                        <source src="./icons/volly.mp4" type="video/mp4">
                      </video>
                      <p></p>
                    </div>
                    <div class="col-xs-12  col-md-6 col-lg-4 pic1">
                      <img src="./icons/foot.jpg" alt="logo">
                      <p></p>
                    </div>
                    <div class="col-xs-12  col-md-6 col-lg-4 vid2">
                      <video controls autoplay loop>
                        <source src="./icons/badmin.mp4" type="video/mp4">
                      </video>
                      <p></p>
                    </div>
                    <div class="col-xs-12  col-md-6 col-lg-4 vid3">
                      <video controls autoplay loop>
                        <source src="./icons/swim.mp4" type="video/mp4">
                      </video>
                      <p></p>
                    </div>
                  <div class="col-xs-12  col-md-6 col-lg-4 pic2">
                    <img src="./icons/golfpic.jpg" alt="logo">
                    <p></p>
                  </div>
                  <div class="col-xs-12  col-md-6 col-lg-4 vid4">
                    <video controls autoplay loop>
                      <source src="./icons/hockey.mp4" type="video/mp4">
                    </video>
                    <p></p>
                  </div>
                </div>
            </div>
            <div class="feature">
              <h3 class="feature_heading">WHAT FEATURES DOES CSPORTS PROVIDE YOU?</h3>
              <div class="feature_inner_div">
                  <div class="vol"><a  class='fas volleyball'>&#xf45f;</a><p>Book, meet, Connect and play with your friends.</p></div>
                  <div class="bas"><a  class='fas basketball'>&#xf434;</a><p>Earn points on booking, collect points to avail discounts</p></div>
                  <div class="rug"><a  class='fas rugby'>&#xf44e;</a><p>Opportunities to take part in events and tournaments!</p></div>
                  <div class="what">
                  <h1>WHAT NEXT? &#129300;</h1>
                    <marquee><h2><span> Connect &#10158; Book &#10158; Meet &#10158; Play &#10158;REPEAT &#128472;    &#9971;</span></h2></marquee>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="login">
                    <div class="login_div" id="login">
                      <form class="logform" action="./php/login.php" method="POST">
                          <div class="log_head">
                            <h2 >Log In</h2>
                          </div>
                          <input type="text" class="input-field" name="name" placeholder="User ID..." required autocomplete="off"/><br>
                          <input type="password" class="input-field" name="pass" placeholder="Password..." required><br>
                          <input type="submit" class="submit_btn" value="Login" id="btnn">
                      </form>
                    </div>
                </div>
              </div>
              <div class="col-6">
                <div class="registration">
                  <div class="reg_div">
                    <form class="regform" action="./php/register.php" method="POST">
                        <div class="reg_head">
                          <h2 >Registration</h2>
                        </div>
                        <input type="text" class="input-field" name="name" placeholder="User ID..." required autocomplete="off" /><br>
                        <input type="password" class="input-field" name="pass" placeholder="Password..." required /><br>
                        <input type="email" class="input-field" name="mail" placeholder="mail Id..." required autocomplete="off"/><br>
                        <!-- <input type="number" id="otp" class="input-field" name="otp" placeholder="Enter the OTP sent to your mail" required /><br> -->
                        <input type="submit" class="submit_btn" value="Register" id="btnn">
                    </form>
                  </div>
                </div>
              </div>
            </div>

            
        </div>
        <div class="footer" id="contact">
          <div class="logo_and_icon">
            <img src="./icons/Csports/logo 1/Csports-logos_white.png" alt="logo" width="160" height="160">
            <div class="icons">
              <i class="fab face fa-facebook"></i>
              <i class="fab git fa-github"></i>
              <i class="fab insta fa-instagram"></i>
              <i class="fab twit fa-twitter"></i>
              <i class="fab what fa-whatsapp"></i>
            </div>
              <div class="address">
                <i class="fa fa-phone ph"></i><i class="a">+91 9203920292</i><br>
                <i class="fa fa-envelope envi"></i><i class="aa">csportsofficial7@gmail.com</i><br>
                <i class="fa fa-map-marker" id="mark"></i><i class="aaa">Building #11 VV towers, Bengaluru 56</i><br>
            </div>
            <div class="subscribe">
              <form>
                <h3>Subscribe</h3>
                <input type="text" class="input-field" placeholder="First Name..." required>
                <input type="password" class="input-field" placeholder="Last Name..." required><br>
                <input type="email" class="maill" placeholder="Mail Id..." required>
                <button type="submit" class="submit">Submit</button>
              </form>
            </div>
          </div>
          <div class="bottom" >
            <p>copyright &copy;2021 csportsofficial. Designed by Vishalnk.</p>
          </div>
        </div>
              
      </div>
      
    <!-- <script>
      document.getElementById("otp").style.display="none";
      function otp(){
        document.getElementById("otp").style.display="block";
      } -->
    </script>
    <!-- Script for jquery so bootstrap.min.js works properly -->
    <script src="./js/jquery.3.6.0.js"></script>

    <!-- JS Script for bootstrap -->
    <script src="./js/bootstrap.min.js"></script>

    <!-- This is online link for carousel -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
