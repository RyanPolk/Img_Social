<?php
    header("Content-Type: text/plain");
    
    //User credentials
    $sUsername = $_GET["username"];
    
    //variable to hold User info
    $sInfo = "";
    
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "img_social";

    //create the SQL query string, uses BINARY to check for case in fields
    $sql = "Select username, firstName, registered, profileImg from users where BINARY username='".$sUsername."'";
              
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sInfo = $row['username'].";".$row['firstName'].";".$row['registered'].";";
        }
    }
    $conn->close();
    echo $sInfo;
?>