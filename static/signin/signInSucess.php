<?php
    function getUserName(){
        return $_POST["userID"];
    }
?>

<h3>
    Welcome <?php echo getUserName()?> You have sucessfully signed in!
</h3>