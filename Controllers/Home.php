<?php 
    class Home extends Controllers
    {
        public function __construct() {
            parent::__construct();
        }
        public function home($params)
        {
            $this->views->getView($this, "home");
        }

        public function datos($params)
        {
            echo "Data received: ". $params;
        }

        public function carrito($params)
        {
            $carrito = $this->model->getCarrito($params);
            echo $carrito;
        }
    }
?>