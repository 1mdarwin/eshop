<?php
    class MyConnection{
        private $username='drw';
        private $password='secret';
        private $host='localhost';
        private $dbname = 'eshop';
        private $connect1;

        public function __construct(){
            $connectionString = "mysql:host=".
                                $this->host.
                                ";dbname=" . $this->dbname.
                                ";charset=utf8";                                
            try {
                //code...
                $this->connect1 = new PDO($connectionString, $this->username, $this->password);
                $this->connect1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Successful connection!!";
            } catch (Exception $e) {
                //throw $th;
                $this->connect1 = 'Error connection';
                echo "ERROR: ". $e->getMessage();
            }

        }
        public function connect(){
            return $this->connect1;
        }        
    }
    // $connect = new MyConnection();
?>