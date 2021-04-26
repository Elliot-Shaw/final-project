<?php 
    include("style.php");
    include("controller.php");
    if(isset($_SESSION["user_logged_in"])){
        logoutUser();
    }else{
        echo "<h1>Login to logout silly</h1><br><a href=\"login.php\">Login</a>";

    }
?>