<?php 
    class UsersModel extends Mysql
    {
        public function __construct() {
            // echo "Message from modelHome";
            parent::__construct();
        }
        public function getAllUsers(){
            $sql = "SELECT * FROM person order by idperson";
            $result = $this->select_all($sql);    
            return $result;
        }        
        
        public function insertUser($arrData){
            
            $sql = "INSERT INTO person(identification, firstname, lastname, telephone, emailperson, idrol, statusperson, passwordperson, createdperson, nit, fiscalname, fiscaladdress, token) ";
            $sql .= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";            
            $result = $this->insert($sql, $arrData);
            return $result;
        }

        public function updateUser($arrData)
        {
            $idperson = $arrData[0];
            array_shift($arrData);
            $sql = "UPDATE person set identification=?, firstname=?, lastname=?, telephone=?, emailperson=?, idrol=?, ";
            $sql .= "statusperson=?, passwordperson=?, createdperson=?, nit=?, fiscalname=?, fiscaladdress=?, token=? WHERE idperson=$idperson";
            $result = $this->update($sql, $arrData);
            return $result;
        }
        /**
         * Edit user from table person
         * @param idperson
         */
        public function getUser($idperson)
        {
            $sql = "SELECT * FROM person where idperson=$idperson";
            $result = $this->select($sql);
            return $result;
        }
        /**
         * Delete user from table person
         * @param idperson
         */
        public function deleteUser($idperson)
        {
            $sql = "DELETE FROM person where idperson=$idperson";
            $result = $this->delete($sql);
            return $result;
        }
        
    }
?>