<?

    /**
     * Get config data from config.json
     * @return Config
     */
    function getConfig(): Config{
        $str = file_get_contents(__DIR__ . '/config/config.json');
        $json = json_decode($str, true);

        return new Config($json);
    }

    /**
     * Config class based on the structure from the config.json
     */
    class Config {
        /**
         * Username for the Database connection
         * @var string
         */
        public $username = "";
        /**
         * Host name for the database connection
         * @var string
         */
        public $hostname = "";
        /**
         * Password for the database connection
         * @var string
         */
        public $password = "";
        /**
         * Port for the database connection
         * @var int
         */
        public $port = 0;
        /**
         * Name for the database connection
         * @var string
         */
        public $databaseName = "";
        /**
         * If the project is in debug mode
         * - This determins if features such as signing in should be disabled
         * @var boolean
         */
        public $debug = false;

        /**
         * Constructor for the Config Object
         * @param array $var
         */
        public function __construct(array $var) {
            $this->username = $var["username"];
            $this->hostname = $var["hostname"];
            $this->password = $var["password"];
            $this->port = $var["port"];
            $this->databaseName = $var["databaseName"];
            $this->debug = $var["debug"];
        }
    }


    /**
     * Get the data from the requested table
     * - If the config is set to debug mode it will create example elements
     * @param string $table - The name of the Table to get data from
     * @return mysqli_result|null - Returns null if connection failed or debug was enabled
     */
    function getData(String $table){

        // Get the config data
        $data = getConfig();

        // If debuging create eample elements and end execution
        if($data->debug == true){
            exampleElement(5);
            return;
        }

        // Connect to the database using the config data
        $dbConn = mysqli_connect($data->hostname, $data->username, $data->password, $data->databaseName);
        // If  the connection fails, display an error message and return
        if(!$dbConn){
            echo "Connection Failed";
            return;
        }

        // Select all data from the inputed  table
        // NOTE: This should be changed to a specific query
        $sql = "SELECT * FROM `$table`";

        // Get the result from the connection
        $result = mysqli_query($dbConn, $sql);
        
        // Return the result
        return $result;
    }

    // Create an element, URL defaults to a placeholder image
    function makeElement($header, $subheader, $text, $url = "https://placehold.co/600x400"){
        // Include the event template page, parameters are automatically passed
        include "static/event.php";
    }

    /**
     * Create example elements
     * @param int $count - Total number of elements to create
     * @return void
     */
    function exampleElement(int $count){
        for($i=1; $i<=$count;$i++){
            makeElement("Header ".$i, "Sub Header".$i, "");
        }
    }
