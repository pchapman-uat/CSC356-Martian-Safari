<?php 
    session_start();
    if(isset($_SESSION["signedIn"])){
        echo "Logged In";
    }else {
        header('location: index.php');
        die();
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
    <main>
        <section class="description">
            <h3>This is information about our events!</h3>
        </section>
      
    </main>

</body>
</html>