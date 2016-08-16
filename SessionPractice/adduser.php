<?php 

    require_once('dbconnectionPDO.php');

    if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password']) AND isset($_POST['cpassword']) && !empty($_POST['cpassword'])){
        
        if($_POST['password'] === $_POST['cpassword']){
            
            echo "Creating Account... ";
            try{
            //SQL Query - Prepared Statement
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO profile (username, hashpass, email) VALUES (:username, :hashpass, :email)";   
            $statement = $con->prepare($sql);
            $statement->bindParam(':username',$username);
            $statement->bindParam(':hashpass',$hashpass);
            $statement->bindParam(':email',$email);
            
            //inserting a row
            $email = $_POST['email'];
            $username = $_POST['username'];
            //Encrypt Password
            $hashpass = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));
            $statement->execute();
            
            echo "User Created!";
                
            }catch(PDOException $e){
                echo "Error: " .  $e->getMessage();
            }
            
            $con = null;
            
        }else{
            echo "Password Fields do not match.";
        }
        
    }else{
        echo "Please fill in the boxes to create your account.";
    }

?>