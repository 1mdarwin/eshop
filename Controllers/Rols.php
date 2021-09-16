<?php 
class Rols extends Controllers
{
    public function __construct() {
        parent::__construct();
    }
    public function Rols()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "rols";
        $data['page_name'] = "user_rols";
        $data['page_title'] = "User Rols";
        $this->views->getView($this, "rols", $data);
    }
}
?>