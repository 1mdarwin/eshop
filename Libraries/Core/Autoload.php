<?php 
    
    spl_autoload_register(function ($clase){
        if (file_exists("Libraries/"."Core/".$clase.".php")) {
            require_once("Libraries/"."Core/".$clase.".php");
        }
    });
?>