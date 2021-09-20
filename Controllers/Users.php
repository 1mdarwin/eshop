<?php 
class Users extends Controllers
{
    public function __construct() {
        parent::__construct();
    }
    public function Users()
    {
        $data['page_id'] = 4;
        $data['page_tag'] = "users";
        $data['page_name'] = "users";
        $data['page_title'] = "Users";
        $this->views->getView($this, "users", $data);
    }
    public function getUsers(){        
        $result = $this->model->getAllUsers();
        echo $result;
    }
}
?>