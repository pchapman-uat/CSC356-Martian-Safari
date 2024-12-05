<?php 

    include_once "global.php";

    // Check if the user is signed in, if not, redirect to the login page
    function checkSession(){
        // If debug is true, don't check if the user is signed in
        $config = getConfig();
        if($config->debug==true) return;
        // Start the session
        session_start();
        // Check if the user is signed in
        if(!isset($_SESSION["signedIn"])){
            // If not signed in navigate to login page
            header('location: login.php');
            die();
        }
    }

    function getEvents(){
        $result = getData("Tours");

        if(isset($result)){
            // Get the length of the response rows
            $len = mysqli_num_rows($result);

            // For each response
            for($i = 0; $i < $len; $i++){
                $data = mysqli_fetch_array($result);
                makeEvent($data["name"], $data["date"], $data["description"]);
            }
        }
    }

    // Check if the user is signed in
    checkSession();

    // Create an event, URL defaults to a placeholder image
    function makeEvent($header, $subheader, $text, $url = "https://placehold.co/600x400"){
        include "static/event.php";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/event.css">
</head>
<body>
    <?php 
        include 'static/header.html';
        include 'static/user.php';
    ?>
    <main>
        <section class="description">
            <h3>This is information about our events!</h3>
            <p>Currently we are not done with this section so be sure to check back later!</p>
        </section>

        <section class="events">
            <!-- If on hosted site uncomment the line below -->
            <?php getEvents()?>
        </section>
    </main>
</body>
</html>