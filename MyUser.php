<?php
    require_once("Autoload.php");    

    class MyUser extends MyConnection{
        private $strName;
        private $intTelephone;
        private $strEmail;
        private $myConnection;

        public function __construct(){
            $this->myConnection = new MyConnection();
            $this->myConnection = $this->myConnection->connect();
        }

        /**
         * Function insert user
         * @param $name
         * @param $telephone
         * @param $eamil 
         * 
         */
        public function insertUser(string $name, int $telephone, string $email){
            $this->strName = $name;
            $this->intTelephone = $telephone;
            $this->strEmail = $email;

            $sql = "INSERT INTO usuario(firstname, telephone, email) VALUES(?,?,?)";
            $insert = $this->myConnection->prepare($sql);
            // echo "Works" . $insert;            
            $arrData = [ $this->strName, $this->intTelephone, $this->strEmail];
            $resInsert = $insert->execute($arrData);
            $idInsert = $this->myConnection->lastInsertId();
            return $idInsert;
        }
        /**
         * Get all users
        */
        public function getUsers(){
            $sql = "SELECT * FROM usuario";
            $execute = $this->myConnection->query($sql);
            $request = $execute->fetchall(PDO::FETCH_ASSOC);
            return $request;
        }
    }
?>