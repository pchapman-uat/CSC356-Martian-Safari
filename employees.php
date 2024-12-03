<?php
    // Include the global file, used for database connection
    include_once "global.php";

    // Get all employees
    function getEmployees(){
        // Get the config data (from global.php)
        $data = getConfig();
        // Connect to the database using the config data
        $dbConn = mysqli_connect($data->hostname, $data->username, $data->password, $data->databaseName);
        // If  the connection fails, display an error message and return
        if(!$dbConn){
            echo "Connection Failed";
            return;
        }

        // Select all data from the employees table
        // NOTE: This should be changed to a specific query
        $sql = "SELECT * FROM `Employees`";

        $result = mysqli_query($dbConn, $sql);
        // Get the length of the response rows
        $len = mysqli_num_rows($result);

        // For each response
        for($i = 0; $i < $len; $i++){
            // Get the data from the row
            $data = mysqli_fetch_array($result);
            // Create an employee using the data
            makeEmployee(formatHeader($data["fName"], $data["lName"], $data["age"]),formatSubheader($data["experience"]), "");
        }
    }

    // Create an employee, URL defaults to a placeholder image
    function makeEmployee($header, $subheader, $text, $url = "https://placehold.co/600x400"){
        // Include the event template page, parameters are automatically passed
        include "static/event.php";
    }

    // Format the header of the employee
    function formatHeader($fName, $lName, $age){
        return $fName . " " . $lName . " - " . $age;
    }
    // Format the Sub Header of the employee
    function formatSubheader($experince){
        return $experince . " years of expereince";
    }

    // Create example employees
    function exampleEmployees(){
        // Create 5 employees
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
            <!-- If on hosted site uncomment the line below -->
            <?//getEmployees()?>
            <?exampleEmployees();?>
        </section>
    </main>
</body>
</html>