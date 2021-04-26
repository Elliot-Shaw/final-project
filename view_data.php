<?php 
    include("controller.php");
    if(!isset($_SESSION["user_logged_in"])){
        header("Location: search.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Data</title>
        <?php include("style.php"); ?>
    </head>
    <body>
        <?php include("nav.php") ?>
        <?php 
            $userData = getUserData();
            echo "<h2>Social Security Number</h2>";
            echo $userData[0];
            echo "<h2>Phone Number</h2>";
            echo $userData[1];
            echo "<h2>Credit Card Number</h2>";
            echo $userData[2];
            echo "<h2>Mothers Maiden Name</h2>";
            echo $userData[3];
        ?>
    </body>
</html>