<?php
$pl=$_POST['pl'];


if (strlen(trim($pl))==0)
 die("Plate can not be blank");


//1. connect
$cnn=mysqli_connect("localhost","caruser","driver","autos");
// Check connection
if (mysqli_connect_errno($cnn))
 {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
 } 
 
//2. prepare & run query
$q="delete from cars where plate='$pl'";

$r=mysqli_query($cnn,$q) or die('Query failed. '.mysqli_error($cnn));

if (mysqli_affected_rows($cnn)>0)
 echo "Record Deleted";
else
 echo "There is no such plate recorded.";

//5. close connection
 mysqli_close($cnn);
?>