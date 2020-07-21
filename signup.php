<?php

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

$servername = "localhost";
$username = "xinyu";
$password = "XiXi1234";
$dbname = "sra221";
$cookie_name = "session_id";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$usr = $_POST["username"];
$pwd = $_POST["password"];
$name = $_POST["fname"];
$phone =$_POST["phone"];
$address =$_POST["address"];
$age =$_POST["age"];
$session_id = md5($usr.$pwd);

$sql = "INSERT INTO login (user_name, password, session_id, name, age, phone, address) VALUES ('". $usr ."', '". $pwd ."', '". $session_id ."', '". $name ."', '". $age ."', '". $phone ."', '". $address ."')";

//echo $sql;


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
    echo "Please go to <a href='login.html'>login page</a> to check your record <br>";
    //echo $cookie_name; 
    //echo $session_id; 
    //echo time() + (86400 * 365);
    //setcookie($cookie_name, $session_id, time() + (86400 * 365), "/"); 
} else {
    echo "You have already signed up!";
}

$conn->close();

?>