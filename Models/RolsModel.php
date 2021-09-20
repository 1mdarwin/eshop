<?php 
    class RolsModel extends Mysql
    {
        public function __construct() {
            // echo "Message from modelHome";
            parent::__construct();
        }
        public function getAllRols(){
            $sql = "SELECT idRol, rolName FROM rol";
            $result = $this->select_all($sql);
            $result = json_encode($result);
            return $result;
        }       
        
    }
?>