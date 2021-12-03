<?php
require_once('Rols.php'); 

class Users extends Controllers
{
    public function __construct() {
        parent::__construct();
    }
    /**
     * Show User view with some parameters
     */
    public function Users(){
        $data['page_id'] = 4;
        $data['page_tag'] = "users";
        $data['page_name'] = "users";
        $data['page_title'] = "Users";
        $data['page_functions_js'] = "functions_users.js";
        $this->views->getView($this, "users", $data);
    }
    /**
     * Allow to insert an user into person table, received $_POST data
     * @return JSON data with two fields (status and message) for show using swal library
     */
    public function setUser(){        
        $currentDate = date('Y-m-d H:i:s');
        $arrData =[];
        foreach($_POST as $k => $v){
            $arrData[] = $v;
        }
        // $arrData['nit'] = ' ';
        // $arrData['fiscalname'] = ' ';
        // $arrData['fiscaladdress'] = ' ';
        // $arrData['token'] = ' ';
        // $arrData['created'] = $currentDate;
        $arrData[] = $currentDate;
        $arrData[] = '';
        $arrData[] = '';
        $arrData[] = '';
        $arrData[] = '';
        if ($_POST['idUser'] == ""){
            array_shift($arrData); // Shift the first element from array
            $result = $this->model->insertUser($arrData);
        }else{
            $result = $this->model->updateUser($arrData);
        }        
        if ($result){
            echo $result = '{
                "msg": "Successful user insert",
                "status":"TRUE"
            }';
        }else{
            echo $result = '{
                "msg": "Failed to insert New User",
                "status":"FALSE"
            }';
        }
    }
    /**
     * Return All users from person table in JSON Format
     */
    public function getUsers(){
        $result = $this->model->getAllUsers();
        $rols = new Rols();
        
        // $result['options'] = '<i class="fa fa-pencil" onclick="fntEditUser(1)"/>';
        for($i=0;$i<sizeof($result);$i++){
            $idRol = intval($result[$i]['idrol']);
            $roles = json_decode($rols->getRol($idRol));
            $idperson = $result[$i]['idperson'];
            $result[$i]['rolname'] = $roles->data->rolName;
            $result[$i]['status'] = (($result[$i]['statusperson'] == 1) ? "Enable" : "Disabled" );
            $result[$i]['options'] = '<i class="fa fa-pencil" onclick="fntEditUser('. $idperson .')" /></i>';
            $result[$i]['options'] .= '&nbsp;&nbsp;<i class="fa fa-trash" onclick="fntDelUser('. $idperson .')" /></i>';

        }
        $result = json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG); // Allos to tags and quotation sign              
        echo $result;
    }
    /**
     * Get user data for update
     * @param $params is got from URL from Controller that split urlpath
     * @return $result like JSON with multi objects
     */
    public function getUser($params){
        $resjson = [];
        $result = $this->model->getUser($params);
        $resjson['data'] = $result;
        if ($result){
            $resjson['status'] = "TRUE";
        }else{
            $resjson['status'] = "FALSE";
        }
        $result = json_encode($resjson);
        echo $result;
    }
    public function delUser()
    {
        $idperson = $_POST['idUser'];
        $result = $this->model->deleteUser($idperson); 
        if ($result){
            echo $result = '{
                "msg": "Successful user deleted",
                "status":"TRUE"
            }';
        }else{
            echo $result = '{
                "msg": "Failed to delete User",
                "status":"FALSE"
            }';
        }
    }
}
?>