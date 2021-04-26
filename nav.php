<?php
if(isset($_SESSION["user_logged_in"])){
    include("static/logged_in_nav.html");
}else{
    include("static/logged_out_nav.html");
}
?>
