<?php 

// PHP MySQL basic operations
$sSearch = $_GET["search"];

// Default MySQL connection credentials

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "img_social";

$db = mysqli_connect($servername,$username,$password,$dbname); //keep your db name

if (strcmp($sSearch, "") == 0) {
	$sql = "SELECT * FROM posts ORDER BY posted DESC";
} else {
	$sql = "SELECT * FROM posts WHERE description LIKE '".$sSearch."%' ORDER BY posted DESC";
}

$sth = $db->query($sql);

// $result=mysqli_fetch_array($sth);

while($row = mysqli_fetch_array($sth) ) {
	echo '<img src="data:image/jpeg;base64,'.$row[2].'"/>';
	echo '|';
	echo '<p>'.$row[3].'</p>';
	echo '|';
	echo $row[0];
	echo '|';
}

?>