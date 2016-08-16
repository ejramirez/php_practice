<?php

    require('dbconnectionPDO.php');

    if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['email']) && !empty($_POST['email'])){
        
        try{
            
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT email FROM profile WHERE username=:username AND email=:email";   
            $statement = $con->prepare($sql);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':email', $email);
            
            
            $username = $_POST['username'];
            $email = $_POST['email'];
            $statement->execute();
            
            if($statement->rowCount() > 0){
                
                echo "Record Found!";
                
                $baseUrl = $_SERVER['SERVER_NAME'];
                
                $sql = "UPDATE profile SET recoverhash=:recoverhash WHERE username=:username AND email=:email"; 
                $statement = $con->prepare($sql);
                $statement->bindParam(':recoverhash', $hash);
                $statement->bindParam(':username', $username);
                $statement->bindParam(':email', $email);
                
                //Creating Hash Code for Email Verification
                $hash = md5(rand(0,1000));
                $username = $_POST['username'];
                $email = $_POST['email'];
                $statement->execute();
                
                //Sending Email Verification
                $to = $email;
                $subject = 'Recover Passoword';
                $msg = "There has been an attempt to recover your password on this email, if this is you please click the link below to proceed with password recovery, if not then please ignore.
    
                Email Verification Link: http://" . $baseUrl . "/SessionPractice/recover.php?email=" . $email . "&hash=" . $hash . "";
    
                //Email Header
                $headers = 'From:noreply@thecitypress.net' . "\r\n";
                //Send Email to User
                mail($to,$subject,$msg,$headers);
                echo "<p>Email Sent!</p>";
                
                $con = null;
                
            }else{
                echo "Record does not exist.";
            }
            
            
            
        }catch(PDOException $e){
                echo "Error: " .  $e->getMessage();
        }
        
    }else{
        echo "Username or Email field are empty.";
    }

?>