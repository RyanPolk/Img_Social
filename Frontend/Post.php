<?php
    //User credentials
    $sDescription = $_GET["description"];
    $file = file_get_contents('php://input');
	$fileblob = base64_encode( $file );
	$user = $_GET["username"];
	$userid = -1;
    
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "img_social";

	//echo '<img src="data:image/jpeg;base64,'.base64_encode( $file ).'"/>';
	//echo $file;

    $conn = new mysqli($servername, $username, $password, $dbname);
	
	$sql = "SELECT * FROM users WHERE username=\"".$user."\";";
	
	$sth = $conn->query($sql);

	// $result=mysqli_fetch_array($sth);	

	while($row = mysqli_fetch_array($sth) ) {
		$userid = $row[0];
		break;
	}
	
	$sql = "INSERT INTO posts (userID, postImg, description) VALUES (".$userid.",\"".$fileblob."\",\"".$sDescription."\");";
	
    //if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>