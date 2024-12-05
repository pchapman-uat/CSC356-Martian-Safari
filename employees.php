<?php
    // Include the global file, used for database connection
    include_once "global.php";

    function getEmployees(){

        $result = getData("Employees");
        
        if(isset($result)){
            // Get the length of the response rows
            $len = mysqli_num_rows($result);

            // For each response
            for($i = 0; $i < $len; $i++){
                // Get the data from the row
                $data = mysqli_fetch_array($result);
                // Create an employee using the data
                makeElement(formatHeader($data["fName"], $data["lName"], $data["age"]),formatSubheader($data["experience"]), "");
            }
        }
    }

    // Format the header of the employee
    function formatHeader($fName, $lName, $age){
        return $fName . " " . $lName . " - " . $age;
    }
    // Format the Sub Header of the employee
    function formatSubheader($experince){
        return $experince . " years of expereince";
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
            <? getEmployees();?>
        </section>
    </main>
</body>
</html>