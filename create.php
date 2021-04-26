<?php include("controller.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create</title>
        <?php include("style.php"); ?>
    </head>
    <body>
        <?php include("nav.php") ?>
        <h1>Create</h1>
        <?php if(isset($createUser)){if(!$createUser){echo "<h3>That username does not work</h3>";}}?>
        <form action="create.php" method="POST">
            Username: <input type="text" name="username" required><br>
            Password: <input type="password" name="password" required><br>
            Social Security Number: <input type="number" name="ssn" required><br>
            Phone Number: <input type="number" name="phone" required><br>
            Credit Card: <input type="number" name="creditCard" required><br>
            Mother's Maiden Name: <input type="text" name="mother" required><br>
            <input type="hidden" name="postRequest" value="createUser">
            <input type="submit" value="create">
        </form>
    </body>
</html>