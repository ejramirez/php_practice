<?php 

    require('dbconnectionPDO.php');
    session_start();

if(isset($_SESSION['email']) && !empty($_SESSION['email']) AND isset($_SESSION['hash']) && !empty($_SESSION['hash'])){
    
    if(isset($_POST['password']) && !empty($_POST['password']) AND isset($_POST['cpassword']) && !empty($_POST['cpassword'])){
        
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        
        if($password === $cpassword){
            
            $sql = "UPDATE profile SET hashpass=:hashpass WHERE email=:email AND recoverhash=:recoverhash"; 
            $statement = $con->prepare($sql);
            $statement->bindParam(':hashpass', $hashpass);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':recoverhash', $recoverhash);
            
            $email = $_SESSION['email'];
            $recoverhash = $_SESSION['hash'];
            $hashpass = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            $statement->execute();
            
            $sql = "UPDATE profile SET recoverhash=:recoverhash WHERE email=:email"; 
            $statement = $con->prepare($sql);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':recoverhash', $recoverhash);
            
            $email = $_SESSION['email'];
            $recoverhash = "";
            $statement->execute();
            
            $con = null;
            session_destroy();
            echo "Success!";
            
            
        }else{
            echo "Fields do not match.";
        }
        
    }else{
        echo "One of the fields is not filled.";
    }

}else{
    echo "Session Expired!";
    session_destroy();
    header('Location: index.php');
    exit();
}

?>