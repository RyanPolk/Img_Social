<?php
    header("Content-Type: text/plain");
    
    //User credentials
    $sPostID = $_GET["postID"];
    
    //variable to hold User info
    $sInfo = "";
    
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "img_social";

    //create the SQL query string, uses BINARY to check for case in fields
    $sql = "SELECT postImg, description, posted, username FROM posts INNER JOIN users ON posts.userID = users.userID WHERE postID=".$sPostID.";";
              
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sInfo = $row['description'].";".$row['username'].";".$row['posted'].";".$row['postImg'].";";
        }
    }
    $conn->close();
    echo $sInfo;
?>