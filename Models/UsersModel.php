<?php 
    class UsersModel extends Mysql
    {
        public function __construct() {
            // echo "Message from modelHome";
            parent::__construct();
        }
        public function getAllUsers(){
            $sql = "SELECT * FROM usuario";
            $result = $this->select_all($sql);
            $result = json_encode($result);
            return $result;
        }       
        
    }
?>