<?php

    function checkRequest(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            include signIn($_POST["userID"], $_POST["password"]);
        }else {
            include "static/signin/signInForm.html";
        }

    }


    function signIn(string $username, string $password): string{
        $result = validateInfo($username, $password);
        if($result){
            return "static/signin/signInSucess.php";
        }
        else {
            return "static/signin/signInFailed.html";
        }
    }
    function validateInfo(string $username, string $password){
        // TODO Add connection to datbase
        return $username != "" && $password != "";
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
</head>
<body>
    <?php include "./static/header.html";?>

    <section class="application">
       <?php echo checkRequest()?>
    </section>
</body>
<script src="script/login.js"></script>
</html>