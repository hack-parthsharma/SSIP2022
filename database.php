<?php
$hostName = "localhost";
$userName = "root";
$password = "";
<<<<<<< HEAD
$databaseName = "ssip";
=======
$databaseName = "test";
>>>>>>> 3d2699b004e1c713055f6e7cc048e3e137e4029b
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>