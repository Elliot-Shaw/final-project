<?php 
    include("controller.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Search</title>
        <?php include("style.php"); ?>
    </head>
    <body>
        <?php include("nav.php") ?>
        <form action="search.php" method="POST">
            <input type="text" name="search" required><br>
            <input type="hidden" name="postRequest" value="search">
            <input type="submit" value="SEARCH!">
        </form>
        <?php 
            if (!isset($_SESSION["user_logged_in"])){
                echo "<h2>log in to search</h2>";
            }else if(isset($_POST["postRequest"]) && isset($_SESSION["user_logged_in"]) && count($results) != 0){
                echo "<h2>Result:</h2><ul>";
                foreach ($results as $result){
                    echo "<li>Link: ".$result[1]."<br>name: ".$result[0]."<br><a href=\"update_website.php?site=".$result[0]."&url=".$result[1]."&siteID=".$result[2]."\">update</a><br><a href=\"delete_website.php?siteID=".$result[2]."\">delete</a></li>";
                }
                echo "</ul>";
            }else if (isset($_POST["postRequest"]) && count($results) == 0){
                echo "<h2>no results</h2>";
            }
        ?>
    </body>
</html>