<?php 
    //Hashing Passwords
    echo password_hash('password', PASSWORD_BCRYPT, 
                       array('cost' => 12));

    $stored_pass = '$2y$14$DQ8ThgIHASPBOis0caV9buzQpHqGh5Y1yskeYbsTvNIfaTUaIp5ra';

    //Verifying Hashed Passwords
    if(password_verify('password',$stored_pass)){
        echo "Success";
    }else{
        echo "Try Again";
    }
    
    //Securing Existing User Passwords
    
    
    
?>