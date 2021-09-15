<?php 
    // Load
    $controllerFile = "Controllers/".$controller.".php";
    // echo $controllerFile;
    if (file_exists($controllerFile)) {
        require_once($controllerFile);
        $controller = new $controller();
        if (method_exists($controller, $method)) {
            $controller->{$method}($params);
        }else {
            require_once("Controllers/Errors.php");
        }
    }else {
        // echo "<strong> ... Controller not found</strong></br>";
        require_once("Controllers/Errors.php");
    }
?>