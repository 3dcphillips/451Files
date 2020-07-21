<?php
$servername = "localhost";
$username = "xinyu";
$password = "XiXi1234";
$dbname = "sra221";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$usr = $_POST["username"];
$pwd = $_POST["password"];

$sql = "SELECT user_name, password, name, phone, address, age, session_id FROM login WHERE user_name='". $usr . "' AND " . "password='" . $pwd . "'";
// echo $sql;
$result = $conn->query($sql);


if ($result == null || $result->num_rows == 0) {
	echo "<h1> WARNING: You are not permitted to access this page! Please login <a href="."'login.html'".">here</a>! </h1> ";
	exit();
}
else {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "Your user name / password / full name / age / phone / address / are: <b>". $row["user_name"]. " / " . $row["password"]. " / " . $row["name"]. " / " . $row["address"]. " / " . $row["age"]. " / " . $row["phone"]. "</b><br>";
	}
}

$conn->close();
?>