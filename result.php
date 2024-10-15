<?php
    // Display all post keys 
    function getKeys(){
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
            <p>Your fourm request has been recived and will be processed shortly</p>
        </section>
    </main>

</body>
</html>