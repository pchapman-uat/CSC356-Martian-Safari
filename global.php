<?
    // Get config data from config.json
    function getConfig(){
        $str = file_get_contents(__DIR__ . '/config/config.json');
        return json_decode($str, true);
    }
