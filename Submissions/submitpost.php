<?php   
if(isset($_POST["email"]) && !empty($_POST["email"]) AND isset($_POST["post"]) && !empty($_POST["post"]) AND isset($_POST["name"]) && !empty($_POST["name"]) AND isset($_POST["title"]) && !empty($_POST["title"])){
    
    $email = $_POST["email"];
    $name = $_POST["name"];
    $post = $_POST["post"];
    $title = $_POST["title"];
    
    //Database Connection 
    require_once('dbconnection.php');
    //Grabbing Website URL
    require_once('constants.php');
    //Grabing Current Date
    $date = date("Y/m/d");
    
    //Creating Hash Code for Email Verification
    $hash = md5(rand(0,1000));
    
    //SQL Query
    $sql = "INSERT INTO posts (Site, Email, Name, Title, Post, Date, Verified, hash) VALUES ('$baseUrl', '$email', '$name', '$title', '$post', '$date', '0', '$hash')";
    
    //Inserting Query into database
    if($con->query($sql) === true){
        //echo "<p>Post Created!</p>";
    }else{
        echo "<p>Error</p>";
    }

    //Database Disconnect
    $con->close();
    
    //Sending Email Verification
    $to = $email;
    $subject = 'Post Verification';
    $msg = "A post was submitted by " . $email . ", if this is you please click the verification link in order for your post to be shown at " . $baseUrl . ", if you did not submit a post then please ignore this email, Thank You.
    
    Note: For every post submitted you must verify it by email in order for it to be shown on the website.
    
    Email Verification Link: http://" . $baseUrl . "/Submissions/verify.php?email=" . $email . "&hash=" . $hash . "";
    
    //Email Header
    $headers = 'From:noreply@thecitypress.net' . "\r\n";
    //Send Email to User
    mail($to,$subject,$msg,$headers);
    echo "<p>Email Sent!</p>";
    
}else{
    echo "<p>No email or post.</p>";
}
?>