<?php 

    // If this value is true, it will bypass checking if the user is signined in using the session
    $GLOBALS['debug'] = true;
    function checkSession(){
        if($GLOBALS['debug']) return;
        session_start();
        if(!isset($_SESSION["signedIn"])){
            header('location: login.php');
            die();
        }
    }

    checkSession();
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
    <?php 
        include 'static/header.html';
        include 'static/user.php';
    ?>
    <main>
        <section class="description">
            <h3>This is information about our events!</h3>
            <p>Currently we are not done with this section so be sure to check back later!</p>
        </section>

        <section class="events">
            <div class="event">
                <div class="content">
                    <h4>Example Title</h4>
                    <h5>Example Subtitle</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <div class="imgDiv">
                     <img src="https://placehold.co/600x400">
                </div>
            </div>
        </section>
    </main>

</body>
</html>