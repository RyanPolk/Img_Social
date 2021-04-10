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

    //create the SQL query string
    $sql = "SELECT SUM(value) AS result FROM likes WHERE postID=".$sPostID.";";
              
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sInfo = $row['result'];
        }
    }
    $conn->close();

    if (strcmp($sInfo, "") == 0) {
        echo 0;
    } else {
        echo $sInfo;
    }
    
?>