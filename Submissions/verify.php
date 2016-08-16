<!DOCTYPE html>
<html>
    
    <head>
        <title>Post Verification</title>
    
    </head>
    
    <body>
        <div id="header">
            <h2>Post Verification</h2>
        </div>
        
        <div id="wrap">
            
            <?php 
            //Grabbing BaseUrl
            require_once('constants.php');
            //Database Connection
            require_once('dbconnection.php');
            
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
                
                $email = mysql_escape_string($_GET['email']); //set email
                $hash = mysql_escape_string($_GET['hash']); //set hash
                
                $sql = "SELECT Email, hash, Verified FROM posts WHERE Email='" . $email . "' AND hash='" . $hash . "' AND Verified='0'";
                $search = mysqli_query($con,$sql) or die(mysqli_error());
                $match = mysqli_num_rows($search);
                
                if($match > 0){
                    //Match
                    $upsql = "UPDATE posts SET Verified='1' WHERE email='" . $email . "' AND hash='" . $hash . "' AND Verified='0'";
                    mysqli_query($con,$upsql) or die(mysql_error());
                    echo "<div class='statusmsg'>Your Post has been verified, it will now be displayed on " . $baseUrl . " </div>";
                }else{
                    //No Match
                    echo '<div class="statusmsg">The url is either invalid or you already have verified your post.</div>';
                    
                }
                
            }else{
                //invalid approach
                echo "<div class='statusmsg'>Invalid approach, please use the link that was sent to your email.</div>";
            }
            
            
            ?>
        </div>
    </body>
    
</html>