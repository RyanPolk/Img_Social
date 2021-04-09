<?php
    //User credentials
    $sDescription = $_GET["description"];
    $file = file_get_contents('php://input');
	$fileblob = base64_encode( $file );
	$userid = 2;
    
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "img_social";

	//echo '<img src="data:image/jpeg;base64,'.base64_encode( $file ).'"/>';
	//echo $file;
	
	$sql = "INSERT INTO posts (userID, postImg, description) VALUES (".$userid.",\"".$fileblob."\",\"".$sDescription."\");";
	
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>