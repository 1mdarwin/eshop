<?php
    require_once("Autoload.php");

    $objUser = new MyUser();
    $insert = $objUser->insertUser("Darwin1 Betancourt",1234, "darwinbc@gmail.com");
    echo $insert;
?>