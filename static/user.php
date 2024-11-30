<!-- This displays the user's name if they are signed in -->

<?php
    // This function displays the user's name if they are signed in
    function getName(){
        if(isset($_SESSION["signedIn"])){ 
            echo "Welcome ".$_SESSION["fName"]."!"; 
        } else { 
            echo "You are currently not signed in"; 
        }
    }
?>
<p class="userInfo"> <?php getName() ?></p>