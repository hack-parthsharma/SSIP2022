// Create a php file in which we have to select the image file and upload it to the mysql database and show that image into another page.
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
else{
echo "connected";
}
mysql_select_db("test", $con);
if(isset($_POST['submit']))
{
if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
{
echo "Please select an image.";
}
else
{
$image= addslashes($_FILES['image']['tmp_name']);
$name= addslashes($_FILES['image']['name']);
$image= file_get_contents($image);
$image= base64_encode($image);
saveimage($name,$image);
}
}
displayimage();
function saveimage($name,$image)
{
$con = mysql_connect("localhost","root","");
mysql_select_db("test",$con);
$qry="insert into image (name,image) values ('$name','$image')";
$result=mysql_query($qry,$con);
if($result)
{
echo "<br/>Image uploaded.";
}
else
{
echo "<br/>Image not uploaded.";
}
}
function displayimage()
{
$con = mysql_connect("localhost","root","");
mysql_select_db("test",$con);
$qry="select * from image";
$result=mysql_query($qry,$con);
while($row = mysql_fetch_array($result))
{
echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' "> ';
}
mysql_close($con);
}
?>
// Path: abc.html
// Create a html file in which we have to select the image file and upload it to the mysql database and show that image into another page.
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit" name="submit" value="Upload" />
</form>
</body>
</html>