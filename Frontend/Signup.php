<?php
    header("Content-Type: text/plain");

    //User credentials
    $sUsername = $_GET["username"];
    $sPassword = $_GET["password"];
    $sConfirmPass = $_GET["confirmPass"];

    //Check to see if the passwords match (Case sensitive)
    if (strcmp($sPassword, $sConfirmPass) == 0) {
        //create the SQL query string
        $sql = "Insert into users(username, password) ".
        "values ('$sUsername','$sPassword')";

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
        echo "Insert successfully. Last inserted ID is: " . $last_id;
        } else {
        echo "Error creating database: " . $conn->error;
        }
        $conn->close();
    } else {
        echo "Password's do not match!";
    }
?>