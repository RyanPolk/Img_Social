<?php
    header("Content-Type: text/plain");

    //User credentials
    $sUsername = $_GET["username"];
    $sFirstName = $_GET["firstName"];
	$file = file_get_contents('php://input');
	
	$sql = "";
	
	if($file != null and $sFirstName != "") {
		$fileblob = base64_encode( $file );
		
		//create the SQL query string
		$sql = "Update users set firstName='".$sFirstName."', profileImg='".$fileblob."' where username='".$sUsername."';";
	}
	else if($file != null) {
		$fileblob = base64_encode( $file );
		
		//create the SQL query string
		$sql = "Update users set profileImg='".$fileblob."' where username='".$sUsername."';";
	}
	else if($sFirstName != "") {
		//create the SQL query string
		$sql = "Update users set firstName='".$sFirstName."' where username='".$sUsername."';";
	} 
	else
	{
		exit();
	}
	
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