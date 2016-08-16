<?php 
    require_once('dbconnection.php');
    session_start();

    if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['password']) && !empty($_POST['password'])){
        
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        
        $sql = "SELECT hashpass FROM profile WHERE username='$username'";
        $result = $con->query($sql);
        
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $hashpass = $row['hashpass'];
        
            //Verifying Hashed Passwords
            if(password_verify($password,$hashpass)){
                echo "Success";
            }else{
                echo "Try Again";
                $con->close();
                exit();
            }
    
            $_SESSION['username'] = $username;
            $con->close();
            header('Location: welcome.php');
            exit();
            
        }else{
            echo "No Result";
        }

        $con->close();
        
    }else{
        echo "<p>Please enter login info.</p>";
    }
?>