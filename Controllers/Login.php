<?php 
class Login extends Controllers
{
    public function __construct() {
        parent::__construct();
    }
    public function Login()
    {
        $data['page_id'] = 5;
        $data['page_tag'] = "Login - eShop";
        $data['page_name'] = "login";
        $data['page_title'] = "Login - eShop";
        $data['page_functions_js'] = "functions_login.js";
        $this->views->getView($this, "login", $data);
    }
}
?>