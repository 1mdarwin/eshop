<?php
    require_once("Config/Config.php");

    $url = !empty($_GET['url']) ? $_GET['url'] : 'Home/home' ;
    $arrUrl= explode("/", $url);

    $controller = $arrUrl[0];
    $method = $arrUrl[0];
    $params = "";

    if (!empty($arrUrl[1])) {
        # code...
        if ($arrUrl[1] != "") {
            # code.julio/100..
            $method = $arrUrl[1];
        }
    }
    

    // print_r($arrUrl);

    if (!empty($arrUrl[2])) {        
        if ($arrUrl[2] != "") {            
            for ($i=2; $i < count($arrUrl) ; $i++) { 
                $params .= $arrUrl[$i].",";
            }
            $params = trim($params, ",");
            // echo $params;
        }
    }
    spl_autoload_register(function ($clase){
        # code...
        if (file_exists(LIBS."Core/".$clase.".php")) {
            require_once(LIBS."Core/".$clase.".php");
        }
    });

    // Load
    $controllerFile = "Controllers/".$controller.".php";
    // echo $controllerFile;
    if (file_exists($controllerFile)) {
        require_once($controllerFile);
        $controller = new $controller();
        if (method_exists($controller, $method)) {
            $controller->{$method}($params);
        }else {
            echo "Method not exists";
        }
    }else {
        echo "<strong> ... Controller not found</strong></br>";
    }

    // echo "<br>";
    // echo "Controller: ". $controller;
    // echo "<br>";
    // echo "Method: " . $method;
    // echo "<br>";
    // echo "params: " . $params;
?>