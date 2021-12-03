<?php 
    class Customers extends Controllers
    {
        public function __construct() {
            parent::__construct();
            session_start();
            // if(empty($_SESSION['login'])){
            //     header('Location:'.base_url().'/login');
            // }
            //getPermissions(3);
            
        }
        public function customers()
        {
            // if(empty($_SESSION['permissionsMod']['r'])){
            //     header('Location:'.base_url().'/login');
            // }
            $data['page_id'] = 2;
            $data['page_tag'] = "Customers - eShop";
            $data['page_title'] = "Customers - eShop";
            $data['page_name'] = "customers";
            $data['page_functions_js'] = "functions_customers.js";
            $this->views->getView($this, "customers", $data);
        }

        
    }
?>