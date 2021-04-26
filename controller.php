<?php
    require("model.php");

    $loginFailed = false;

    startSession();

    $postRequest = $_POST["postRequest"] ?? "";

    function printUsers(){
        $rows = getUsers();
        foreach ($rows as $row){
            echo "<tr>";
            foreach($row as $element){
                echo "<td>".$element."</td>";
            }
            echo "<tr>";
        }
    }

    function logoutUser(){
        logoutCurrentUser();
        header("Location: home.php");
            exit();
    }

    if ($postRequest === "createUser"){
        $createUser = createUser($_POST["username"], $_POST["password"]);
        if($createUser){
            addCredentials($_POST["username"], $_POST["ssn"], $_POST["phone"], $_POST["creditCard"], $_POST["mother"]);
            header("Location: home.php");
            exit();
        }
    }

    if ($postRequest === "login"){
        if(loginUser($_POST["username"],$_POST["password"])){
            startUserSession();
            header("Location: home.php");
            exit();
        }else{
            $loginFailed = true;
        }
    }

    if ($postRequest === "search" && isset($_SESSION["user_logged_in"])){
        $results = searchFor($_POST["search"]);
    }

    if ($postRequest === "addWebsite" && isset($_SESSION["user_logged_in"])){
        $addedSite = addSite($_POST["websiteName"],$_POST["websiteURL"]);
    } 

    if ($postRequest === "updateWebsite" && isset($_SESSION["user_logged_in"])){
        $updatedSite = updateSite($_POST["websiteName"], $_POST["websiteURL"], $_POST["websiteID"]);
        header("Location: search.php");
        exit();
    }
?>