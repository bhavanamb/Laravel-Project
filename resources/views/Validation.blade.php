<?php

if(isset($_REQUEST['email'])){
        $email = $_REQUEST["email"];

        function email_validation($email)
        {
        return (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? FALSE : TRUE; 
        } 
        
        if(!email_validation($email)) 
        { 
            echo "Invalid email address."; 
        } 
    }
    
if(isset($_REQUEST['pwd'])){
    $password = $_REQUEST["pwd"];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $spec_char    = preg_match('@[\W]@', $password);
    
    if(!$uppercase || !$lowercase || !$number || !$spec_char ||strlen($password) < 8 || strlen($password) > 10) {
        echo "Invalid Password! Password should be between 8 to 10 characters and should include digits, uppercase, lowercase and special character "; 
    } 
    else{
        echo "";
    }
}
    
    ?>
