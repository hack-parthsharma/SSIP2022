<!-- create a php programe for insert the data in database -->
<?php
// database connection 
$con=mysqli_connect("localhost","root","","ssip");
// check connection
if (mysqli_connect_errno())
{
echo "<script>alert('Failed to connect to MySQL:')</script> ";
}
// get values from form
$cid=$_POST['caseid'];
$d=$_POST['department'];
$s=$_POST['subject'];
$cb=$_POST['Created_by'];
$r=$_POST['remarks'];
// Upload file name
$fl=$_FILES['file']['name'];
$stu='pending';
// $stu=$_POST['status'];
$cd=$d;
$des=$_POST['Destination'];
$date=date('d-m-y');
//Insert into database named ddo.

$sql="INSERT INTO ddo VALUES ('$cid','$d','$s','$cb','$date','$r','$fl','$stu','$cd','$des')";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}

?>
<?php
include('../database.php');
//check there is a upload folder or not.
if(!is_dir('upload'))
{
mkdir('upload');
}
// $target = "upload/".basename($_FILES['file']['name']);
// $file = $_FILES['file']['name'];
$filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "./upload/" . $filename;
// check file is uploaded or not.
if(move_uploaded_file($_FILES['file']['tmp_name'], $folder))
{
echo "<script>alert('File uploaded successfully and stored into upload')</script>";
}
else
{
echo "<script>alert('File not uploaded successfully')</script>";
}
// connect to the database
$con = mysqli_connect("localhost","root","","ssip");
if (!$con)
{
die('Could not connect: ');
}
// store the file name into database.
$sql = "INSERT INTO upload (name) VALUES ('$folder')";
mysqli_query($con, $sql);
echo "</br>";
// check file is uploaded at database or not.
if(mysqli_query($con, $sql))
{
echo "<script>alert('File uploaded successfully')</script>";
}
else
{
echo "<script>alert('File not upload')</script>";
}
// close the connection
mysqli_close($con);
header("Location:user_dashboard.php");
?>