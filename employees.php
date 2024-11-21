<?php
    function getConfig(){
        $str = file_get_contents(__DIR__ . '/config/config.json');
        return json_decode($str, true);
    }

    function getEmployees(){
        $data = getConfig();
        $dbConn = mysqli_connect($data["hostname"], $data["username"], $data["password"], $data["databaseName"]);
        
        if(!$dbConn){
            echo "Connection Failed";
            return;
        }

        $sql = "SELECT * FROM `Employees`";

        $result = mysqli_query($dbConn, $sql);
        

        $len = mysqli_num_rows($result);

        for($i = 0; $i < $len; $i++){
            $data = mysqli_fetch_array($result);
            makeEmployee(formatHeader($data["fName"], $data["lName"], $data["age"]),formatSubheader($data["experience"]), "");
        }
    }

    function makeEmployee($header, $subheader, $text, $url = "https://placehold.co/600x400"){
        include "static/event.php";
    }

    function formatHeader($fName, $lName, $age){
        return $fName . " " . $lName . " - " . $age;
    }

    function formatSubheader($experince){
        return $experince . " years of expereince";
    }

    function exampleEmployees(){
        makeEmployee("Header 1","subHeader 1" , "");
        makeEmployee("Header 2", "subHeader 2", "");
        makeEmployee("Header 3", "subHeader 3", "");
        makeEmployee("Header 4", "subHeader 4", "");
        makeEmployee("Header 5", "subHeader 5", "");
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
            <h3>This is information about our employees!</h3>
            <p>Currently we are not done with this section so be sure to check back later!</p>
        </section>
        <section class="events">
            <?//getEmployees()?>
            <?exampleEmployees();?>
        </section>
    </main>
</body>
</html>