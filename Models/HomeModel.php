<?php 
    class HomeModel extends Mysql
    {
        public function __construct() {
            // echo "Message from modelHome";
            parent::__construct();
        }
        
        public function setUser(string $nombre, int $telephone, string $email)
        {
            $query_insert = "INSERT INTO usuario(firstname, telephone, email) VALUES(?,?,?)";
            $arr_data = array($nombre, $telephone, $email);
            $request_insert = $this->insert($query_insert, $arr_data);
            return $request_insert;
        }

        public function getUser(int $id)
        {
            $sql = "SELECT * FROM usuario WHERE id=$id";
            $request = $this->select($sql);
            return $request;
        }

        public function updateUser(int $id, string $nombre, $telephone, $email)
        {
            $sql = "UPDATE usuario SET firstname= ?, telephone=?, email=? WHERE id = $id";
            $arrData = [$nombre, $telephone, $email];
            $request = $this->update($sql, $arrData);
            return($request);
        }

        public function getUsers()
        {
            $sql = "SELECT * FROM usuario";
            $request = $this->select_all($sql);
            return ($request);
        }

        public function delUser(int $id)
        {
            $sql = "DELETE FROM usuario WHERE id = $id";
            $result = $this->delete($sql);
            return $result;
        }
        // public function getCarrito($params)
        // {
        //     return "<pre>Data carrito: </pre>". $params;
        // }
    }
?>