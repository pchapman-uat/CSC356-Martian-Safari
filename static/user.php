<?php
    function getName(){
        if(isset($_SESSION["signedIn"])){ 
            echo "Welcome ".$_SESSION["fName"]."!"; 
        } else { 
            echo "You are currently not signed in"; 
        }
    }
?>
<p class="userInfo"> <?php getName() ?></p>