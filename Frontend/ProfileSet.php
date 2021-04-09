<?php
    header("Content-Type: text/plain");

    //User credentials
    $sUsername = $_GET["username"];
    $sFirstName = $_GET["firstName"];

    //create the SQL query string
    $sql = "Update users set firstName='".$sFirstName."' where username='".$sUsername."';";

    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "img_social";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $result = $conn->query($sql);
    if ($result === TRUE) {
    $last_id = $conn->insert_id;
        echo "Update Successful";
    }
    $conn->close();
     
?>