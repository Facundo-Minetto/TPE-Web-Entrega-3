 <?php
    require_once "app/models/config.php";

    class Model
    {
        protected $db;

        function __construct()
        {
            $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        }
        public function connect(){
            return $this->db;
        }
        
    }