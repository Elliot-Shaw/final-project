<?php 
    include("controller.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <?php include("style.php"); ?>
    </head>
    <body>
        <?php include("nav.php") ?>
        <?php if (isset($_SESSION["user_logged_in"])){
                include("static/welcome.html");
            }else{
                include("static/greeting.html");
            }
        ?>
    </body>
</html>