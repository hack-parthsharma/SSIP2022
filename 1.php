<?php
// connect to database using mysql.
$con=mysqli_connect("localhost","root","","ssip");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// select the table
$result = mysqli_query($con,"SELECT * FROM ddo");
// fetch the data from the table
$arr=array();
while($row = mysqli_fetch_array($result))
  {
    $arr[]=$row;
  // retrive data like case id, department, subject, created by, creation date, remarks, documents, status, current department, destination department
  // echo $row['CaseID'] . " " . $row['Department'] . " " . $row['Subject'] . " " . $row['CreatedBy'] . " " . $row['CreationDate'] . " " . $row['Remarks'] . " " . $row['Documents'] . " " . $row['Status'] . " " . $row['CurrentDepartment'] . " " . $row['DestinationDepartment'];
  // echo "<br>";
  }
  echo "</br>";
  echo json_encode($arr);
// close the connection
mysqli_close($con);
?>