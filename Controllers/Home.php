<?php 
    class Home extends Controllers
    {
        public function __construct() {
            parent::__construct();
        }
        public function home()
        {
            $data['tag_page'] = "home";
            $data['page_title'] = "Front Page";
            $data['page_name'] = "Home";
            $this->views->getView($this, "home", $data);
        }

        public function insertar()
        {
            $data = $this->model->setUser("Willan Betancourt", 1234567, "gerencia@terracivil.ec");
            print_r($data);
        }
        
        public function showUser($id)
        {
            $show = $this->model->getUser($id);
            print_r($show);
        }

        public function updateUser()
        {
            $update = $this->model->updateUser(1, "Pedro Pablo B", 1234567, "pedropablobc@gmail.com");
            print_r($update);
        }

        public function showUsers()
        {
            $showUsers = $this->model->getUsers();
            print_r($showUsers);
        }

        public function deleteUser($id)
        {
            $delUser = $this->model->delUser($id);
            print_r($delUser);
        }
        
        // public function datos($params)
        // {
        //     echo "Data received: ". $params;
        // }

        // public function carrito($params)
        // {
        //     $carrito = $this->model->getCarrito($params);
        //     echo $carrito;
        // }
    }
?>