<?php 
    class Home
    {
        public function __construct() {
            // $this->var = $var;
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