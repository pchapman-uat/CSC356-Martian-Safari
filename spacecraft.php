<?php
     function getSpacecrafts(){
        $data = getConfig();
        $dbConn = mysqli_connect($data->hostname, $data->username, $data->password, $data->databaseName);
        
        if(!$dbConn){
            echo "Connection Failed";
            return;
        }

        $sql = "SELECT * FROM `Spacecraft`";

        $result = mysqli_query($dbConn, $sql);
        

        $len = mysqli_num_rows($result);

        for($i = 0; $i < $len; $i++){
            $data = mysqli_fetch_array($result);
            makeSpacecraft(formatHeader($data["fName"], $data["lName"], $data["age"]),formatSubheader($data["experience"]), "");
        }
    }

    function makeSpacecraft($header, $subheader, $text, $url = "https://placehold.co/600x400"){
        include "static/event.php";
    }
    function exampleSpacecraft(){
        makeSpacecraft("Header 1","subHeader 1" , "");
        makeSpacecraft("Header 2", "subHeader 2", "");
        makeSpacecraft("Header 3", "subHeader 3", "");
        makeSpacecraft("Header 4", "subHeader 4", "");
        makeSpacecraft("Header 5", "subHeader 5", "");
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
    <?php include "static/header.html"?>
    <main>
        <section class="description">
            <h3>This is information about our Spacecraft!</h3>
            <p>Currently we are not done with this section so be sure to check back later!</p>
        </section>
        <section class="events">
            <? exampleSpacecraft();?>
        </section>
    </main>
</body>
</html>