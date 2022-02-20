<?php
$servername = "localhost";
$dBusersName = "root";
$dBpassword = "";
$dBName= "phpproject01";

// Create connection
$conn = mysqli_connect($servername, $dBusersName, $dBpassword, $dBName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>