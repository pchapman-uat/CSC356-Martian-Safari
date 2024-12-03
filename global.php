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

        public function __construct($var) {
            $this->username = $var["username"];
            $this->hostname = $var["hostname"];
            $this->password = $var["password"];
            $this->port = $var["port"];
            $this->databaseName = $var["databaseName"];
        }
    }
