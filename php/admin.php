<?php
    include '../php/links.php';
    include '../php/DBconnection.php';
    session_start();
    if(isset($_SESSION['admin']))
    {
      $sel="select name,points from register group by name order by points DESC";
      $sel1="select name,mail,points from register";
      $que=mysqli_query($conn,$sel);
      $coun=mysqli_num_rows($que);
      $que1=mysqli_query($conn,$sel1);
      $coun1=mysqli_num_rows($que1);
    ?>

    <html>
    <head>
        <link rel="stylesheet" href="../css/admin.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- 1st chart -->
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['cname', 'count'],
            <?php
            $sql = "select cname,count(*) as count from booking_record where cname in (select distinct(cname) from booking_record) group by cname order by cname DESC;";
            $fire = mysqli_query($conn,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['cname']."',".$result['count']."],";
              }

            ?>
            ]);

            var options = {
              title: 'MOST VENUES BOOKED'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
          }
        </script>
        <!-- 2nd chart -->
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['sport', 'count'],
            <?php
            $sql = "select sport,count(*) as count from sports where sport in (select distinct(sport) from sports) group by sport order by sport DESC;";
            $fire = mysqli_query($conn,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['sport']."',".$result['count']."],";
              }

            ?>
            ]);

            var options = {
              title: 'NUMBER OF VENUES REGISTERED FOR FOLLOWING SPORTS:'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
          }
        </script>

        <!-- 3rd chart -->
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

            var data = google.visualization.arrayToDataTable([
              ['sport_type', 'count'],
            <?php
            $sql = "select sport_type,count(*) as count from booking_record where sport_type in (select distinct(sport_type) from booking_record) group by sport_type order by count DESC;";
            $fire = mysqli_query($conn,$sql);
              while ($result = mysqli_fetch_assoc($fire)) {
                echo"['".$result['sport_type']."',".$result['count']."],";
              }

            ?>
            ]);

            var options = {
              title: 'MOST BOOKED SPORTS BY PLAYERS:'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

            chart.draw(data, options);
          }
        </script>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

        </head>
        <body>
        <div class="top container">
            <a href="#" class="fa admin user fa-user"></a>
            <h2>ADMIN</h2>
            <a class="log" href="../php/admin_logout.php">LOGOUT</a>   
        </div>
        <div class="left container">
        <i class="fas fa-volleyball-ball"></i><a class="anc" href="#" onclick="one()">POINTS TABLE</a><br>
        <i class="fas fa-volleyball-ball"></i><a class="anc" href="#" onclick="two()">CSPORTS USERS</a><br>
        <i class="fas fa-volleyball-ball"></i><a class="anc" href="#piechart" onclick="three()">VENUES IN DEMAND</a><br>
        <i class="fas fa-volleyball-ball"></i><a class="anc" href="#piechart3" onclick="five()">SPORTS IN DEMAND</a><br>
        <i class="fas fa-volleyball-ball"></i><a class="anc" href="#piechart2" onclick="four()">VENUES REGISTERED UNDER WHICH SPORT TYPE?</a><br>
        <!-- <i class="fas fa-volleyball-ball"></i><a class="anc" href="#" onclick="six()">ADD VENUES</a><br>-->
        <i class="fas fa-volleyball-ball"></i><a class="anc" href="#" onclick="sev()">UPDATE PASSWORD</a><br> 
        </div>


        <div class="right container table-responsive" id="right">
            <h2>POINTS TABLE</h2>
                <table class="table table-bordered table-striped table-condensed table-fixed">
                <thead>
                    <tr>
                    <th scope="col">RANK</th>
                    <th scope="col">NAME</th>
                    <th scope="col">POINTS</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                $i=0; 
                        while($res=mysqli_fetch_array($que)){
                            $i+=1;             
                    ?>
                    <tr>
                    <th scope="roww" id="vvv" value="<?php echo $i?>"><?php echo $i?></th>
                    <td value="<?php echo $res[0];?>"><?php echo $res[0];  ?></td>
                    <td value="<?php echo $res[1];?>"><?php echo $res[1];  ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                </table>
        </div>


        <div class="right1 container table-responsive" id="right1">
            <h2>CSPORTS USERS</h2>
                <table class="table table-bordered table-striped table-condensed table-fixed">
                <thead>
                    <tr>
                    <th scope="col">Nos.</th>
                    <th scope="col">NAME</th>
                    <th scope="col">MAIL ID</th>
                    <th scope="col">POINTS EARNED</th>
                    </tr>
                </thead>
                <tbody>
                <?php  
                $i=0; 
                        while($res1=mysqli_fetch_array($que1)){
                            $i+=1;             
                    ?>
                    <tr>
                    <th scope="roww" id="vvv" value="<?php echo $i?>"><?php echo $i?></th>
                    <td value="<?php echo $res1[0];?>"><?php echo $res1[0];  ?></td>
                    <td value="<?php echo $res1[1];?>"><?php echo $res1[1];  ?></td>
                    <td value="<?php echo $res1[2];?>"><?php echo $res1[2];  ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
                </table>
        </div>
        <div class="right2" id="piechart">
        </div>
        <div class="right3" id="piechart2">
        </div>
        <div class="right4" id="piechart3">
        </div>
        <div class="right5 container-fluid" id="right2">
          <h3>ADMIN PASSWORD UPDATE</h3>
          <form class="regform" action="../php/admin_pass_update.php" method="POST">
              <label>Enter your old password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" class="input-field" name="oldpass"  required /><br><br>
              <label>Enter your new password:</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" class="input-field" name="newpass"  required /><br><br>
              <input type="submit" class="submit_btn" value="UPDATE" id="btnn">
          </form>
        </div>  
        <script>
            function one(){
                document.getElementById("right").style.display="block";
                document.getElementById("right1").style.display="none";
                document.getElementById("right2").style.display="none";
                document.getElementById("piechart").style.display="none";
                document.getElementById("piechart2").style.display="none";
                document.getElementById("piechart3").style.display="none";
            }
            function two(){
                document.getElementById("right").style.display="none";
                document.getElementById("right1").style.display="block";
                document.getElementById("right2").style.display="none";
                document.getElementById("piechart").style.display="none";
                document.getElementById("piechart2").style.display="none";
                document.getElementById("piechart3").style.display="none";
            }
            function three(){
                document.getElementById("right").style.display="none";
                document.getElementById("right1").style.display="none";
                document.getElementById("right2").style.display="none";
                document.getElementById("piechart").style.display="block";
                document.getElementById("piechart2").style.display="none";
                document.getElementById("piechart3").style.display="none";
            }
            function four(){
                document.getElementById("right").style.display="none";
                document.getElementById("right1").style.display="none";
                document.getElementById("right2").style.display="none";
                document.getElementById("piechart").style.display="none";
                document.getElementById("piechart2").style.display="block";
                document.getElementById("piechart3").style.display="none";
            }
            function five(){
                document.getElementById("right").style.display="none";
                document.getElementById("right1").style.display="none";
                document.getElementById("right2").style.display="none";
                document.getElementById("piechart").style.display="none";
                document.getElementById("piechart2").style.display="none";
                document.getElementById("piechart3").style.display="block";
            }
            // function six(){
            //     document.getElementById("right").style.display="none";
            //     document.getElementById("right1").style.display="none";
            //     document.getElementById("piechart").style.display="none";
            //     document.getElementById("piechart2").style.display="none";
            //     document.getElementById("piechart3").style.display="none";
            // }
            function sev(){
                document.getElementById("right").style.display="none";
                document.getElementById("right1").style.display="none";
                document.getElementById("right2").style.display="block";
                document.getElementById("piechart").style.display="none";
                document.getElementById("piechart2").style.display="none";
                document.getElementById("piechart3").style.display="none";

            }
        </script>
        </body>
      </html>
<?php
}
else{  
  echo "login please";
  header("refresh:1; url=../front_page.php");
    }
?>