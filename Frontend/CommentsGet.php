<?php
    header("Content-Type: text/plain");
    
    //User credentials
    $sPostID = $_GET["postID"];
    
    //variable to hold User info
    $sInfo = [];
    
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "img_social";

    //create the SQL query string
    $sql = "SELECT comment, commented, username FROM comments INNER JOIN users ON comments.userID = users.userID WHERE postID=".$sPostID." ORDER BY commented DESC;";
              
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data = $row['comment']."|".$row['commented']."|".$row['username']."|";
            array_push($sInfo, $data);
        }
    }
    $conn->close();
    echo json_encode($sInfo);
?>