<?php 
    session_start();
    if(!isset($_SESSION["signedIn"])){
        header('location: login.php');
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
    <?php 
        include './static/header.html';
        include './static/user.php';
    ?>
    <main>
        <section class="description">
            <h3>This is information about our events!</h3>
            <p>Currently we are not done with this section so be sure to check back later!</p>
        </section>
      
    </main>

</body>
</html>