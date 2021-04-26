<?php 
    include("controller.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <?php include("style.php"); ?>
    </head>
    <body>
        <?php include("nav.php") ?>
        <h1>Login</h1>
        <?php if($loginFailed){echo "<h3>Username or password wrong</h3>";}?>
        <form action="login.php" method="POST">
            Username: <input type="text" name="username" required><br>
            Passwrod: <input type="password" name="password" required><br>
            <input type="hidden" name="postRequest" value="login">
            <input type="submit" value="login">
        </form>
    </body>
</html>