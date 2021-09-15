<?php 
    class MyConnection{
        private $connect;

        public function __construct() {
            $connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
            try {
                $this->connect = new PDO($connectionString,DB_USER,DB_PASS);
            } catch (PDOException $e) {
                $this->connect = "Error connection";
                echo "ERROR: ". $e->getMessage();
            }
        }
        
        function connect(){
            return $this->connect;
        }

        
    }
?>