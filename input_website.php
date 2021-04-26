<?php include("controller.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Website</title>
        <?php include("style.php"); ?>
    </head>
    <body>
        <?php include("nav.php") ?>
        <h1>Add a Website to Our Database!</h1>
        <form action="input_website.php" method="POST">
            Website Name: <input type="text" name="websiteName"><br>
            Website URL: <input type="text" name="websiteURL"><br>
            <input type="hidden" name="postRequest" value="addWebsite">
            <input type="submit" value="Add Site">
        </form>
        <?php 
            if (!isset($_SESSION["user_logged_in"])){
                echo "<h2>log in to add website</h2>";
            }else if(isset($_POST["postRequest"]) && isset($_SESSION["user_logged_in"]) && isset($addedSite)){
                if($addedSite){
                    echo "<h2>Successfully Added</h2>";
                }else{
                    echo "<h2>Site already exists in database</h2>";
                }
            }
        ?>
    </body>
</html>