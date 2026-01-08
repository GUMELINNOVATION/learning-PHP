<?php
extract($_POST);
//$pl=$_POST['pl'];
//$mk=$_POST['mk'];
//$md=$_POST['md'];


//1. connect
$cnn=mysqli_connect("localhost","caruser","driver","autos");

// Check connection
if (mysqli_connect_errno($cnn))
 {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
 }
 

//3. prepare & run query
$q="update cars set make='$mk',model='$md' where plate='$pl'";

$r=mysqli_query($cnn,$q) or die('Query failed. '.mysqli_error($cnn));

if (mysqli_affected_rows($cnn)>0)
 echo "Record Updated";
else
 echo "Something else happened. (Maybe somebody else deleted the record)";

//5. close connection
 mysqli_close($cnn);
?>