<?php 

    session_start();

    if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
        
        echo "Welcome, " . $_SESSION['username'] . ". ";
        //echo session_id();
        
    }else{
        
        echo "Please Log In.";
        
    }

?>