<?php 
class Users extends Controllers
{
    public function __construct() {
        parent::__construct();
    }
    /**
     * Show User view with some parameters
     */
    public function Users()
    {
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

        array_shift($arrData); // Shift the first element from array
        $result = $this->model->insertUser($arrData);        
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
        $result = json_encode($result);
        echo $result;
    }
}
?>