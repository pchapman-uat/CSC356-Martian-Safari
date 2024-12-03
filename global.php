<?
    // Get config data from config.json
    function getConfig(){
        $str = file_get_contents(__DIR__ . '/config/config.json');
        $json = json_decode($str, true);

        return new Config($json);
    }

    class Config {
        public $username = "";
        public $hostname = "";
        public $password = "";
        public $port = 0;
        public $databaseName = "";
        public $debug = false;

        public function __construct($var) {
            $this->username = $var["username"];
            $this->hostname = $var["hostname"];
            $this->password = $var["password"];
            $this->port = $var["port"];
            $this->databaseName = $var["databaseName"];
            $this->debug = $var["debug"];
        }
    }


    function getData(String $table){

        $data = getConfig();
        if($data->debug == true){
            exampleElement();
            return;
        }

        // Connect to the database using the config data
        $dbConn = mysqli_connect($data->hostname, $data->username, $data->password, $data->databaseName);
        // If  the connection fails, display an error message and return
        if(!$dbConn){
            echo "Connection Failed";
            return;
        }

        // Select all data from the employees table
        // NOTE: This should be changed to a specific query
        $sql = "SELECT * FROM `$table`";

        $result = mysqli_query($dbConn, $sql);
        
        return $result;
    }

    // Create an employee, URL defaults to a placeholder image
    function makeElement($header, $subheader, $text, $url = "https://placehold.co/600x400"){
        // Include the event template page, parameters are automatically passed
        include "static/event.php";
    }

    // Create example employees
    function exampleElement(){
        // Create 5 employees
        makeElement("Header 1","subHeader 1" , "");
        makeElement("Header 2", "subHeader 2", "");
        makeElement("Header 3", "subHeader 3", "");
        makeElement("Header 4", "subHeader 4", "");
        makeElement("Header 5", "subHeader 5", "");
    }
