<?php
    session_start();
    function checkRequest(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            include signIn($_POST["userID"], $_POST["password"]);
        }else {
            include "static/signin/signInForm.html";
        }

    }


    function signIn(string $username, string $password): string{
        $result = validateInfo($username, $password);
        if(isset($result)){
            addToSession($result);
            return "static/signin/signInSucess.php";
        }
        else {
            return "static/signin/signInFailed.html";
        }
    }

    function addToSession($result){
        $_SESSION["fName"] = $result["fName"];
        $_SESSION["lName"] = $result["lName"];
        $_SESSION["signedIn"] = true;
    }
    function validateInfo(string $username, string $password){
        $data = getConfig();

        $dbConn = mysqli_connect($data["hostname"], $data["username"], $data["password"], $data["databaseName"]);

        if(!$dbConn){
            echo "Connection Failed";
            return;
        }

        $sql = "SELECT * FROM Users WHERE UID='$username' AND password='$password'";
        // echo $sql;
        $result = mysqli_query($dbConn, $sql);
        // return;
        $check = mysqli_fetch_array($result);
        return $check;
    }
    function getUserName(){
        return $_POST["userID"];
    }

    function getPassword(){
        return $_POST["password"];
    }

    function getConfig(){
        $str = file_get_contents(__DIR__ . '/config/config.json');
        return json_decode($str, true);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/login.css">
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>
<body>
    <?php include "static/header.html";?>

    <section class="application">
       <?php echo checkRequest()?>
    </section>
</body>
<script src="script/login.js"></script>
</html>