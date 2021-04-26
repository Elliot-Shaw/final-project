<?php 
include("controller.php");
$deleteID = $_GET["siteID"] ?? 0;
if (isset($_SESSION["user_logged_in"])){
    deleteSite($deleteID);
} 
header("Location: search.php");
exit();
?>
