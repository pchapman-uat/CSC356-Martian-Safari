<?php
    // Display all post keys 
    function getKeys(): void{
        $post_keys = array_keys($_POST);

        foreach ($post_keys as $key) {
            echo $key . "<br>";
        }
    }

    function checkAge(): bool {
        $age = $_POST["age"];
        try {
            $age = (int) $age;
        } catch (TypeError) {
            return false;
        }
        return $age >= 18;
    }

    function getAgeChance(): float{
        if(checkAge()){
            $age = (int) $_POST["age"];

            $result = 30 - $age;
            $result = abs($result);

            if($result >= 30){
                return 0.0;
            }else {
                return  (30-$result) / 30;
            }
        } else {
            return 0;
        }
    }
    function getExperince():float {
        return (float) $_POST["experince"] / 5;
    }
    function applicationChance(): float{
        $totalChecks = 2;
        $currChecks = 0;
        if(!checkAge()) return 0;
        $currChecks += getAgeChance();
        $currChecks += getExperince();

        return $currChecks / $totalChecks;
    }

    function percentFormat($num): string{
        return $num*100 . "%";
    }

    function calcChance(): string{
        $num = applicationChance();
        if($num >= 1) $num = 0.99;
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