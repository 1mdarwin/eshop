<?php 
    class Home extends Controllers
    {
        public function __construct() {
            parent::__construct();
        }
        public function home($params)
        {
            echo "<br>Message from controller";
        }

        public function datos($params)
        {
            echo "Data received: ". $params;
        }
    }
?>