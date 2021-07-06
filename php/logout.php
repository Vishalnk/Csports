<?php
    session_start();
    include ("../php/links.php");
    if(isset($_SESSION['userdetails'])){
        unset($_SESSION['userdetails']);
        unset($_SESSION['bookdetails']);
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
                        <h5 class="modal-title">LOG OUT SUCCESSFUL </h5><i class="fas fa-volleyball-ball"></i>
                    </div>
                    <div class="modal-body">
                        <p>Be back soon! <br><br>
                        <i class="fas fa-check"></i></p>
                        <br>
                        
                    </div>
                    </div>
                </div>
                </div>
            </body>
          </html>

        <?php
        header("refresh:2; url=../front_page.php");
        session_destroy();
    }
    else{
        echo "login please";
        header("refresh:2; url=../front_page.php");
    }

?>

