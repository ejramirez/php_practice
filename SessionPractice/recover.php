<?php 

    session_start();

    require('dbconnectionPDO.php');

    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        
        
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT recoverhash FROM profile WHERE email=:email AND recoverhash=:recoverhash";   
        $statement = $con->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':recoverhash', $hash);
            
            
        $email = $_GET['email'];
        $hash = $_GET['hash'];
        $statement->execute();
        
        if($statement->rowCount() > 0){
            
            $_SESSION['email'] = $email;
            $_SESSION['hash'] = $hash;
                
            echo "Good to go.";
            $con = null;
            header("Location: recoverpage.php");
            exit();
            
        }else{
            echo "Record Not Found!";
            session_destroy();
            header("Location: index.php");
            exit();
        }
        
    }else{
        echo "Invalid Approach!";
        session_destroy();
        header("Location: index.php");
        exit();
    }

?>