<?php
    header("Content-Type: text/plain");

    //User credentials
    $sPostID = $_GET["postID"];
    $sUsername = $_GET["username"];
    $sUserID = "";
    $ValidateUserID = "";

    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "img_social";

    //Make connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    //Create the SQL query string
    $sql = "SELECT userID FROM users WHERE username='".$sUsername."';";
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sUserID = $row['userID'];
        }
    }

    //Create the SQL query string
    $sql = "SELECT userID FROM likes WHERE userID=".$sUserID." AND postID=".$sPostID.";";
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ValidateUserID = $row['userID'];
        }
    }

    // If the user has already liked the post die
    if (strcmp($sUserID, $ValidateUserID) == 0) {
        die;
    } else {
        //create the SQL query string
        $sql = "INSERT INTO likes (userID, postID, value) VALUES (".$sUserID.", ".$sPostID.", 1)";
        $result = $conn->query($sql);
        if ($result === TRUE) {
        $last_id = $conn->insert_id;
            echo "Update Successful";
        }
        $conn->close();
    }
     
?>