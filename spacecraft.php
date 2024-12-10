<?php

    include_once "global.php";
     function getSpacecrafts(){
       
        $result = getData("Spacecraft");

        if(isset($result)){
            // Get the length of the response rows
            $len = mysqli_num_rows($result);

            for($i = 0; $i < $len; $i++){
                $data = mysqli_fetch_array($result);
                makeSpacecraft($data["make"]. " ". $data["model"], $data["date"], "");
            }
        }
    }

    function makeSpacecraft($header, $subheader, $text, $url = "https://placehold.co/600x400"){
        include "static/event.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Martian Safari - Spacecraft</title>
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/event.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.png">
</head>
<body>
    <?php 
        include 'static/header.html';
        include 'static/user.php';
    ?>
    <main>
        <section class="description">
            <h3>This is information about our Spacecraft!</h3>
            <p>Currently we are not done with this section so be sure to check back later!</p>
        </section>
        <section class="events">
            <? getSpacecrafts();?>
        </section>
    </main>
</body>
</html>