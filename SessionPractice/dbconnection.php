<?php 

    //Database Credentials
    $dbuser = "root";
    $dbpass = "";
    $dbhost = "localhost";
    $dbname = "account";
        
    //Database Connection
    $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    
    if(mysqli_connect_errno())
    {
        echo '<p>Error: '.mysqli_connect_error().'</p>';
    }
    else
    {
        //echo '<p>Connected!</p>';
    }

?>