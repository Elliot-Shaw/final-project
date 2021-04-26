<?php
    try {
        $dsn = "mysql:host=localhost;dbname=cs_350";
        $username = "student";
        $password = "CS350";
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $msg = $e->getMessage();
        echo "<p>$msg</p>";
    }

    function startSession(){
        session_set_cookie_params(600,"/");
        session_start();
        session_regenerate_id();
    }

    function getUsers(){
        global $db;

        $query = "SELECT * FROM users";
        $statement = $db->prepare($query);
        $statement->execute();
        $row = $statement->fetch();

        $users = array();

        while ($row != NULL){
            $user = array($row["id"], $row["username"], $row["password"]);
            array_push($users, $user);
            $row = $statement->fetch();
        }
        $statement->closeCursor();

        return $users;
    }

    function getUserData(){
        global $db;

        $query = "SELECT * FROM user_data WHERE id=".$_SESSION["user_id"];
        $statement = $db->prepare($query);
        $statement->execute();
        $row = $statement->fetch();
        
        $userData = array($row["ssn"], $row["phone_number"], $row["credit_card"], $row["mother"]);
    
        $statement->closeCursor();

        return $userData;
    }

    function isUser($username){
        global $db;
        $insert = "SELECT * FROM users WHERE username=:username";
            $statement = $db->prepare($insert);
            $statement->bindValue(':username', $username);

            $statement->execute();

            $row = $statement->fetch();

            if ($row == NULL){
                return false;
            }

            $statement->closeCursor();
            return true;
    }

    function createUser($username, $password){
        global $db;

        $password = password_hash($password, PASSWORD_DEFAULT);

        try{
            if($password === FALSE){
                throw new Exception("password hash failed");
            }

            $insert = "INSERT INTO users (username, password)
                        VALUES (:username, :password)";
                        
            $statement = $db->prepare($insert);
            $statement->bindValue(":username", $username);
            $statement->bindValue(":password", $password);

            $statement->execute();
            $statement->closeCursor();

            return true;
        }catch(Exception $e){
            return false;
        }
    }

    function addCredentials($username, $ssn, $phone, $credit, $mother){
        global $db;

        try{
            $insert = "INSERT INTO user_data (userID, ssn, phone_number, credit_card, mother)
                        VALUES ((SELECT id FROM users WHERE username=:username), :ssn, :phone, :credit, :mother);";
                        
            $statement = $db->prepare($insert);
            $statement->bindValue(":username", $username);
            $statement->bindValue(":ssn", $ssn);
            $statement->bindValue(":phone", $phone);
            $statement->bindValue(":credit", $credit);
            $statement->bindValue(":mother", $mother);

            $statement->execute();
            $statement->closeCursor();
        }catch(Exception $e){
        }
    }

    function loginUser($username, $password){
        global $db;

        try {    
            $insert = "SELECT * FROM users WHERE username=:username";
            $statement = $db->prepare($insert);
            $statement->bindValue(':username', $username);

            $statement->execute();

            $row = $statement->fetch();

            if ($row == NULL){
                return false;
            }

            $dbPassword = $row["password"];
            $_SESSION["user_id"] = $row["id"];

            $statement->closeCursor();

        } catch (PDOException $e) {
            $msg = $e->getMessage();
            echo "<p>$msg</p>";
        }

        return password_verify($password, $dbPassword);
    }

    function logoutCurrentUser(){
        unset($_SESSION["user_logged_in"]);
    }

    function startUserSession(){
        $_SESSION["user_logged_in"] = true;
    }

    function searchFor($search){
        global $db;

        try {    
            $insert = "SELECT * FROM websites WHERE name=:name";
            $statement = $db->prepare($insert);
            $statement->bindValue(':name', $search);

            $statement->execute();
            $row = $statement->fetch();

            $queryResults = array();

            while ($row != NULL){
                $result = array($row["name"], $row["url"], $row["id"]);
                array_push($queryResults, $result);
                $row = $statement->fetch();
            }

            $statement->closeCursor();

            return $queryResults;

        } catch (PDOException $e) {
            $msg = $e->getMessage();
            echo "<p>$msg</p>";
        }
    }

    function addSite($name, $url){
        global $db;

        try{
            $insert = "INSERT INTO websites (name, url)
                        VALUES (:name, :url);";
                        
            $statement = $db->prepare($insert);
            $statement->bindValue(":name", $name);
            $statement->bindValue(":url", $url);
            
            $statement->execute();
            $statement->closeCursor();

            return true;
        }catch(Exception $e){
            return false;
        }
    }

    function updateSite($name, $url, $id){
        global $db;

        try{
            $insert = "UPDATE websites
                      SET name=:name, url=:url
                      WHERE id=:id";
                        
            $statement = $db->prepare($insert);
            $statement->bindValue(":name", $name);
            $statement->bindValue(":url", $url);
            $statement->bindValue(":id", $id);
            
            $statement->execute();
            $statement->closeCursor();

            return true;
        }catch(Exception $e){
            return false;
        }
    }

    function deleteSite($id){
        global $db;

        try{
            $insert = "DELETE FROM websites WHERE id=:id";
                        
            $statement = $db->prepare($insert);
            $statement->bindValue(":id", $id);
            
            $statement->execute();
            $statement->closeCursor();
        }catch(Exception $e){
            return false;
        }
    }
?>