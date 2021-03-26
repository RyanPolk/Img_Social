<?php
    header("Content-Type: text/plain");
    
    //User credentials
    $sUsername = $_GET["username"];
    $sPassword = $_GET["password"];
    
    //variable to hold User info
    $sInfo = "";
    
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "img_social";

    //create the SQL query string, uses BINARY to check for case in fields
    $sql = "Select * from users where BINARY username='".$sUsername."' AND BINARY password='".$sPassword."'";
              
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sInfo = $row['username'];
        }
    } else {
        echo "Login failed, please try again.";
    }
    $conn->close();
    echo $sInfo;
?>