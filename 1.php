<?php
// connect to mysql database.
// connect to the database
$con = mysqli_connect("localhost","root","","ssip");
if (!$con)
{
die('Could not connect: ');
}
// create button for getting uploaded files.
$sql = "SELECT * FROM upload";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result))
{
// show files in new tab of browser.
echo "<a href='/SSIP2022/assets/".$row['name']."' target='_blank'>".$row['name']."</a>";
echo "</br>";
}

?>