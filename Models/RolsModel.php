<?php 
    class RolsModel extends Mysql
    {
        public function __construct() {
            // echo "Message from modelHome";
            parent::__construct();
        }
        public function getAllRols(){
            $sql = "SELECT * FROM rol order by idRol";
            $result = $this->select_all($sql);                  
            return $result;
        }
        public function insertRol($arrData){
            
            $sql = "INSERT INTO rol(rolName, description, statusRol) VALUES(?,?,?)";            
            $result = $this->insert($sql, $arrData);
            return $result;
        }

        public function updateRol($arrData)
        {
            $idrol = $arrData[0];
            array_shift($arrData);
            $sql = "UPDATE rol set rolName=?, description=?, statusRol=? WHERE idrol=$idrol";
            $result = $this->update($sql, $arrData);
            return $result;
        }
        /**
         * Edit Rol from table rol
         * @param idrol
         */
        public function getRol($idrol)
        {
            $sql = "SELECT * FROM rol where idrol=$idrol";
            $result = $this->select($sql);
            return $result;
        }
        /**
         * Delete Rol from table rol
         * @param idrol
         */
        public function deleteRol($idrol)
        {
            $sql = "DELETE FROM rol where idRol=$idrol";
            $result = $this->delete($sql);
            return $result;
        }       
        
    }
?>