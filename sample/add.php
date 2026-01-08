<?php
extract($_POST);
//$pl=$_POST['pl'];
//$mk=$_POST['mk'];
//$md=$_POST['md'];

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
$q="insert into cars(plate,make,model) values('$pl','$mk','$md')";

$r=mysqli_query($cnn,$q) or die('Query failed. '.mysqli_error($cnn));

if (mysqli_affected_rows($cnn)>0)
 echo "Record Saved";
else
 echo "Something else happened";

//3. close connection
 mysqli_close($cnn);
?>