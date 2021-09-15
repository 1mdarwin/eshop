<?php 
    class HomeModel
    {
        public function __construct() {
            // echo "Message from modelHome";
        }
        public function getCarrito($params)
        {
            return "<pre>Data carrito: </pre>". $params;
        }
    }
?>