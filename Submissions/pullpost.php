<?php 
    //Database Connection
    require_once('dbconnection.php');
    //Grabs BaseUrl
    require_once('constants.php');
    
    $sql = "SELECT Email, Name, Title, Post, Date FROM posts WHERE Site='$baseUrl' AND Verified='1'";
    $result = $con->query($sql);
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<br><hr> Email: " . $row['Email'] . "<br> Name: " . $row['Name'] . "<br> Date: " . $row['Date'] . "<br> Title: " . $row['Title'] . "<br> Post: " . $row['Post'];
        }
    }else{
            echo "<p>No Results</p>";
    }

    $con->close();

?>