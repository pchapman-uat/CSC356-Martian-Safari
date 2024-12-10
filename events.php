<?php 

    // Include the global PHP which handles config, database connection, and more
    include_once "global.php";

    function checkSession(){
        // Get the config (From global.php)
        $config = getConfig();
        // If we are debuging bypass redirect to login
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

    /**
     * Get the events from the "Tours" table in the datbase
     * @return void
     */
    function getEvents(){
        // Get the data from the database table "Tours"
        $result = getData("Tours");

        // If there is data
        if(isset($result)){
            // Get the length of the response rows
            $len = mysqli_num_rows($result);

            // For each response
            for($i = 0; $i < $len; $i++){
                // Get the data from the row
                $data = mysqli_fetch_array($result);
                // Make an event
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
    <title>Martian Safari - Events</title>
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
            <?php getEvents()?>
        </section>
    </main>
</body>
</html>