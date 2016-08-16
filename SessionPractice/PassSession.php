<?php 

    session_start();

    if(isset($_SESSION['email']) && !empty($_SESSION['email']) AND isset($_SESSION['hash']) && !empty($_SESSION['hash'])){
        
        
        
    }else{
        
        echo "Invalid Approach!";
        session_destroy();
    }

?>