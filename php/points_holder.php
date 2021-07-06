<?php

    include '../php/DBconnection.php';
    include '../php/links.php';
    include '../php/top_for_points_holder.php';
    $sel="select name,points from register group by name order by points DESC";
    $que=mysqli_query($conn,$sel);
    $coun=mysqli_num_rows($que);
    foreach($_SESSION['userdetails'] as $key=>$value){
    $name=$value['username'];
}
    
?>
<html>
<head>
<!-- <link rel="stylesheet" href="../css/tablee.css"> -->
<style>
    .tablee{
        width:800px;
        transform:translate(30%,10%);
        text-align:center;
        margin-bottom:100px;
    }
    .abc:hover{
        background-color:pink;
    }
    thead{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 1);
        background-image:linear-gradient(to bottom right,#077b8a,#a2d5c6);
        color:darkblue;
    }
    h2{
        text-align:center;
        color:darkblue;
        font-weight:500;
    }

</style>
</head>
<body>
<h2>POINTS TABLE</h2>
<table class="tablee table table-hover" id="vv" >
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
      <th scope="row" id="vv" value="<?php echo $i?>"><?php echo $i?></th>
      <td value="<?php echo $res[0];?>"><?php echo $res[0];  ?></td>
      <td value="<?php echo $res[1];?>"><?php echo $res[1];  ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
    <script>
        var n1 = document.getElementById("vv").rows.length;
        var i=0,j=0;
        var str="";
        
        for(i=1; i<n1;i++){
        
        var n2 = document.getElementById("vv").rows[i].cells.length;
        var n22 = document.getElementById("vv").rows[i].cells.item(1).innerHTML;
        if (n2=="0"){
            document.getElementById("vv").rows[1].style.backgroundColor="#3366ff";
            document.getElementById("vv").rows[1].style.color="white";
        }
        else{
            document.getElementById("vv").rows[1].style.backgroundColor="#3366ff";
            document.getElementById("vv").rows[1].style.color="white";
        }
        if(n2=="1"){
            document.getElementById("vv").rows[2].style.backgroundColor="#4d79ff";
            document.getElementById("vv").rows[2].style.color="white";
        }
        else{
            document.getElementById("vv").rows[2].style.backgroundColor="#4d79ff";
            document.getElementById("vv").rows[2].style.color="white";
        }
        if(n2=="2"){
            document.getElementById("vv").rows[3].style.backgroundColor="#668cff";
            document.getElementById("vv").rows[3].style.color="white";
        }
        else{
            document.getElementById("vv").rows[3].style.backgroundColor="#668cff";
            document.getElementById("vv").rows[3].style.color="white";
        }
        if(n22=="<?php echo $name?>"){

            document.getElementById("vv").rows[i].style.backgroundColor="#ff9900";
            document.getElementById("vv").rows[i].style.color="green";
            document.getElementById("vv").rows[i].style.fontSize="25px";
        }
        else{
            document.getElementById("vv").rows[i].style.backgroundColor="cornslik";
        }
        
        for(j=0; j<n2;j++){
        
        var x=document.getElementById("vv").rows[i].cells.item(j).innerHTML;
        
            str=str+x+":";
        
        }
        str=str+"#";
        
        }
        // document.getElementById("pp").innerHTML=str;

    </script>
</table>
</body>
</html>