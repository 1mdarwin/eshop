<?php 
class Rols extends Controllers
{
    public function __construct() {
        parent::__construct();
    }
    public function Rols()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "rols";
        $data['page_name'] = "user_rols";
        $data['page_title'] = "User Rols";
        $data['page_functions_js'] = "functions_rols.js";
        $this->views->getView($this, "rols", $data);
    }

    public function getRols()
    {
        $result = $this->model->getAllRols();
        
        // $result['options'] = '<i class="fa fa-pencil" onclick="fntEditUser(1)"/>';
        for($i=0;$i<sizeof($result);$i++){
            $idrol = $result[$i]['idRol'];
            $result[$i]['options'] = '<i class="fa fa-pencil" onclick="fntEditRol('. $idrol .')" /></i>';
            $result[$i]['options'] .= '&nbsp;&nbsp;<i class="fa fa-trash" onclick="fntDelRol('. $idrol .')" /></i>';            
        }
        $result = json_encode($result, JSON_HEX_QUOT | JSON_HEX_TAG); // Allos to tags and quotation sign              
        echo $result;
    }
    /**
     * Get rols from databases and show them into HTML <option></option>
     */
    public function getSelectRols(){
        $result = $this->model->getAllRols();
        $htmlRol = '';
        foreach($result as $rol){
            $htmlRol .= '<option value='.$rol['idRol'].'>'.$rol['rolName'].'</option>';
        }
        echo $htmlRol;        
    }
    /**
     * Allow to insert an user into person table, received $_POST data
     * @return JSON data with two fields (status and message) for show using swal library
     */
    public function setRol(){        
        
        $arrData =[];
        foreach($_POST as $k => $v){
            $arrData[] = $v;
        }     
        
        if ($_POST['idRol'] == ""){
            array_shift($arrData); // Shift the first element from array
            $result = $this->model->insertRol($arrData);
        }else{
            $result = $this->model->updateRol($arrData);
        }        
        if ($result){
            echo $result = '{
                "msg": "Successful Rol insert",
                "status":"TRUE"
            }';
        }else{
            echo $result = '{
                "msg": "Failed to insert New Rol",
                "status":"FALSE"
            }';
        }
    }
    /**
     * Get user data for update
     * @param $params is got from URL from Controller that split urlpath
     * @return $result like JSON with multi objects
     */
    public function getRol($params){
        $resjson = [];
        $result = $this->model->getRol($params);
        $resjson['data'] = $result;
        if ($result){
            $resjson['status'] = "TRUE";
        }else{
            $resjson['status'] = "FALSE";
        }
        $result = json_encode($resjson);
        return $result;
    }
    public function delRol()
    {
        $idrol = $_POST['idRol'];
        $result = $this->model->deleteRol($idrol);        
        if ($result){            
            echo $result1 = '{
                "msg": "Successful user deleted",
                "status":"TRUE"
            }';
        }else{
            echo $result1 = '{
                "msg": "Failed to delete Rol",
                "status":"FALSE"
            }';
        }
    }
}
?>