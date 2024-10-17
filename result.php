<?php
    // Display all post keys 
    function getKeys(): void{
        // Convert post keys to array
        $post_keys = array_keys($_POST);

        // For each loop, this saves each value from array as a new varriable
        foreach ($post_keys as $key) {
            echo $key . "<br>";
        }
    }

    // Check the age returning a boolean if the age is valid
    // Check for non number 
    function checkAge(): bool {
        // Get age value from post
        $age = $_POST["age"];
        // Try to convert to integer
        try {
            $age = (int) $age;
        } catch (TypeError) {
            return false;
        }
        // Return if the age is 18 or more
        return $age >= 18;
    }


    // Get the chance based on the age value
    // Returns a float from 0-1
    function getAgeChance(): float{
        // Check if the age is valid
        if(checkAge()){
            // Since the age is valid it must be a number
            $age = (int) $_POST["age"];

            // Find the difference from the target age
            $result = 30 - $age;
            // Get the absolute value of the difference
            $result = abs($result);

            // If the result is greater than 30, such as an age of 0, or 60, default to 0
            if($result >= 30){
                return 0.0;
            }else {
                // Return a percentage difference based on the target value
                return  (30-$result) / 30;
            }
        } else {
            return 0;
        }
    }

    // Get the experince value
    // Returns a float from 0-1
    function getExperince():float {
        return (float) $_POST["experince"] / 5;
    }
    // Calcualate the application chance
    // Returns a float from 0-1

    function applicationChance(): float{
        // Total number of checks
        $totalChecks = 2;
        // Current value from the checks
        $currChecks = 0;
        // If the age is not valid return 0
        if(!checkAge()) return 0;
        // Add the age chance to the total
        $currChecks += getAgeChance();
        // Add the experince chance to the total
        $currChecks += getExperince();

        // Return a float percentage for the chance
        return $currChecks / $totalChecks;
    }

    // Convert a number to a percentage string
    function percentFormat($num): string{
        return $num*100 . "%";
    }

    // Main function that calculates and displays the chance
    // Returns the adjusted percetage string
    function calcChance(): string{
        // Get the application chance
        $num = applicationChance();
        // If the number is 1 or higher, set it to 99
        if($num >= 1) $num = 0.99;
        // Get the percent format version
        $result = percentFormat($num);
        return $result;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/main.css">
</head>
<body>
    <h1>Martian Safari</h1>
    <div class="logoDiv">
        <img src="assets/placeholder-logo.png">
    </div>

    <main>
        <section class="description">
            <h2> Welcome <?php echo $_POST["fName"] . " " . $_POST["lName"]; ?>!</h2>
            <h2>Your chance of getting accepted is: <?php echo calcChance()?></h2>
            <p>Your fourm request has been recived and will be processed shortly</p>
        </section>
    </main>

</body>
</html>