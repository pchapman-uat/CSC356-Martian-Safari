<?php
    session_start();
    // Check if this page is being requested by a POST request
    function checkRequest(){
        // If the request is a POST request, sign in the user
        // Else display the sign in form
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            include signIn($_POST["userID"], $_POST["password"]);
        }else {
            include "static/signin/signInForm.html";
        }

    }

    include_once "global.php";


    // Sign in the user
    function signIn(string $username, string $password): string{
        // Validate the username and password
        $result = validateInfo($username, $password);
        // Check if there is a value 
        if(isset($result)){
            // Add the data to the session
            addToSession($result);
            // Display the sign in success page
            return "static/signin/signInSucess.php";
        }
        else {
            // Display the sign in failed page
            return "static/signin/signInFailed.html";
        }
    }

    // Add values to the session
    function addToSession($result){
        $_SESSION["fName"] = $result["fName"];
        $_SESSION["lName"] = $result["lName"];
        $_SESSION["signedIn"] = true;
    }

    // Validate the username and password
    function validateInfo(string $username, string $password){
        // Get the config data (from global.php)
        $data = getConfig();

        $dbConn = mysqli_connect($data["hostname"], $data["username"], $data["password"], $data["databaseName"]);

        if(!$dbConn){
            echo "Connection Failed";
            return;
        }

        // Select all data from the Users table where the username and password match
        $sql = "SELECT * FROM Users WHERE UID='$username' AND password='$password'";
        $result = mysqli_query($dbConn, $sql);
        $check = mysqli_fetch_array($result);

        // Return the data if it exists
        return $check;
    }

    // Get the username from the POST request
    function getUserName(){
        return $_POST["userID"];
    }
    // Get the password from the POST request
    function getPassword(){
        return $_POST["password"];
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