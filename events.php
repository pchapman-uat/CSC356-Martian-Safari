<?php 

    // If this value is true, it will bypass checking if the user is signed in using the session
    $GLOBALS['debug'] = true;

    // Check if the user is signed in, if not, redirect to the login page
    function checkSession(){
        // If debug is true, don't check if the user is signed in
        if($GLOBALS['debug']) return;
        // Start the session
        session_start();
        // Check if the user is signed in
        if(!isset($_SESSION["signedIn"])){
            // If not signed in navigate to login page
            header('location: login.php');
            die();
        }
    }

    // Include global for database connections
    include_once "global.php";

    function getEvents(){
        if($GLOBALS["debug"]){
            exampleEvents();
            return;
        }
        //  Get the config data (from global.php)
        $data = getConfig();
        // Connect to the database using the config data
        $dbConn = mysqli_connect($data->hostname, $data->username, $data->password, $data->databaseName);

        // If  the connection fails, display an error message and return
        if(!$dbConn){
            echo "Connection Failed";
            return;
        }

        // Select all data from the Tours table
        $sql = "SELECT * FROM Tours";

        $result = mysqli_query($dbConn, $sql);
        

        // Get the length of the response rows
        $len = mysqli_num_rows($result);

        // For each response make an event
        for($i = 0; $i < $len; $i++){
            $data = mysqli_fetch_array($result);
            makeEvent($data["name"], $data["date"], $data["description"]);
        }
    }

    // Check if the user is signed in
    checkSession();

    // Create an event, URL defaults to a placeholder image
    function makeEvent($header, $subheader, $text, $url = "https://placehold.co/600x400"){
        include "static/event.php";
    }

    // Create example events
    function exampleEvents(){
        makeEvent("Event 1", "10/24/50", "FFFF FFFF  FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF FFFF ");
        makeEvent("Special Event Event", "10/24/50", "placeholder");
        makeEvent("Cool Event", "10/24/50", "placeholder");
        makeEvent("Hello World", "10/24/50", "placeholder");
        makeEvent("Event 6", "10/24/50", "placeholder");
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