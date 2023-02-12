<?php
if(isset($_POST['submit'])) {
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "database_name";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $date_time = date("Y-m-d H:i:s");

  $sql = "INSERT INTO tablename (date_time)
  VALUES ('$date_time')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>

<form action="" method="post">
  <input type="submit" name="submit" value="Submit">
</form>
