<?php include("controller.php");
    $URL = $_GET["url"] ?? "";
    $siteName = $_GET["site"] ?? "";
    $siteID = $_GET["siteID"] ?? 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Website</title>
        <?php include("style.php"); ?>
    </head>
    <body>
        <?php include("nav.php") ?>
        <h1>Update Website</h1>
        <form action="update_website.php" method="POST">
            Website Name: <input type="text" name="websiteName" value="<?php echo $siteName;?>" required><br>
            Website URL: <input type="text" name="websiteURL" value="<?php echo $URL;?>" required><br>
            <input type="hidden" name="websiteID" value="<?php echo $siteID;?>">
            <input type="hidden" name="postRequest" value="updateWebsite">
            <input type="submit" value="Update Site">
        </form>
        <?php 
            if (!isset($_SESSION["user_logged_in"])){
                echo "<h2>log in to update website</h2>";
            }
        ?>
    </body>
</html>