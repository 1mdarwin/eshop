<?php
    
    // Get the path of the website
    function base_url()
    {
        return BASE_URL;
    }
    // Depuring function
    function dep($data){
        print_r("<pre>");
        print_r($data);
        print_r("</pre>");
    }

    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''],$strCadena);
        $string = trim($string); // Delete space at the begin and the end of the string
        $string = stripslashes($string); // Delete slashes
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);

        return $string;
    }

    function passGenerator($length = 10){
        $pass = "";
        $lengthPass = $length;
        $pattern = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $lengthString = strlen($pattern);
        for ($i=1; $i < $lengthPass; $i++) { 
            $pos = rand(0,$lengthString-1);
            $pass .= substr($pattern, $pos, 1);
        }
        
        return $pass;

    }

    function token(){
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));

        return $token=$r1 .'-'. $r2 .'-'. $r3 .'-'. $r4;
    }
?>