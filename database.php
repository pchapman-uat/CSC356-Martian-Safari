<?php

    function getConfig(){
        $str = file_get_contents(__DIR__ . '/config/config.json');
        return json_decode($str, true);
    }
    function connectSQL(){
        $data = getConfig();
        // return;
        $dbConn = mysqli_connect($data["hostname"], $data["username"], $data["password"], $data["databaseName"]);
        
        if(!$dbConn){
            echo "Connection Failed";
        }
        
        
        $sql = "SELECT * FROM `Employees`";

        $result = mysqli_query($dbConn, $sql);

        $check = mysqli_fetch_array($result);

        if(isset($check)){
            echo "Sucess!";
        }
    }

    connectSQL();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
