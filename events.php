<?php 

    // If this value is true, it will bypass checking if the user is signined in using the session
    $GLOBALS['debug'] = true;
    function checkSession(){
        if($GLOBALS['debug']) return;
        session_start();
        if(!isset($_SESSION["signedIn"])){
            header('location: login.php');
            die();
        }
    }

    function getConfig(){
        $str = file_get_contents(__DIR__ . '/config/config.json');
        return json_decode($str, true);
    }

    function getEvents(){
        $data = getConfig();
        $dbConn = mysqli_connect($data["hostname"], $data["username"], $data["password"], $data["databaseName"]);

        if(!$dbConn){
            echo "Connection Failed";
            return;
        }

        $sql = "SELECT * FROM Tours";

        $result = mysqli_query($dbConn, $sql);
        

        $len = mysqli_num_rows($result);

        for($i = 0; $i < $len; $i++){
            $data = mysqli_fetch_array($result);
            makeEvent($data["name"], $data["date"], $data["description"]);
        }
    }

    checkSession();

    function makeEvent($header, $subheader, $text, $url = "https://placehold.co/600x400"){
        include "static/event.php";
    }

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
            <?//php getEvents()?>
            <?php exampleEvents();?>
        </section>
    </main>
</body>
</html>