<?php
$servername = "localhost";
$username = "xinyu";
$password = "XiXi1234";
$dbname = "sra221";
$cookie_name = "session_id";

//echo $_COOKIE[$cookie_name] . '<br>';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user_name, password, name, phone, address, age, session_id FROM login";
$result = $conn->query($sql);

$flag = False;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "session id: " . $row["session_id"] . "<br>";
		if(isset($_COOKIE[$cookie_name])) {
			if ($_COOKIE[$cookie_name] === $row["session_id"])
				$flag = True;
				echo "<h1>Welcome</h1>";
				echo "Your user name / password / full name / age / phone / address / are: <b>". $row["user_name"]. " / " . $row["password"]. " / " . $row["name"]. " / " . $row["address"]. " / " . $row["age"]. " / " . $row["phone"]. "</b>";
				exit();
		}
		else {
			echo "<h1> WARNING: You are not permitted to access this page! Please login <a href="."'login.html'".">here</a>! </h1> ";
			exit();
		}
    }
} 

echo "<h1> WARNING: You are not permitted to access this page! Please exit! </h1> ";

$conn->close();
?>