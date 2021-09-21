<?php 
    class UsersModel extends Mysql
    {
        public function __construct() {
            // echo "Message from modelHome";
            parent::__construct();
        }
        public function getAllUsers(){
            $sql = "SELECT * FROM users";
            $result = $this->select_all($sql);
            $result = json_encode($result);
            return $result;
        }
        
        public function insertUser($arrData){
            $sql = "INSERT INTO person(identification, firstname, lastname, telephone, emailperson, idrol, createdperson, statusperson) ";
            $sql .= "VALUES(?,?,?,?,?,?,?,?)";
            $result = $this->insert($sql, $arrData);
            return $result;
        }
        
    }
?>