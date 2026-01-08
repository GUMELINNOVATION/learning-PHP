<?php
extract($_POST);
if (strlen(trim($pl))==0)
 die("Plate can not be blank");

//1. connect
$cnn=mysqli_connect("localhost","caruser","driver","autos");

// Check connection
if (mysqli_connect_errno($cnn))
 {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
 }
 

//3. prepare & run query
$q="select * from cars where ";

if ($slc=='E')
 $q.= "plate='$pl'";
else // for S
 $q.= "plate like '$pl%'";

$r=mysqli_query($cnn,$q) or die('Query failed');
//4. list items
if (mysqli_num_rows($r)>1) // if records exist
{
	echo '<table border="1"><tr><th>Plate</th><th>Make</th><th>Model</th></tr>';
	while($rec=mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
		echo '<tr>';
		echo '<td>'.$rec['plate'].'</td>';
		echo '<td>'.$rec['make'].'</td>';
		echo '<td>'.$rec['model'].'</td>';
		echo '</tr>';
	}

	echo '</table>';
}
if (mysqli_num_rows($r)==1) // if just one record
{
	echo '<table border="0">';
	$rec=mysqli_fetch_array($r,MYSQLI_ASSOC);
	echo '<tr><th>Plate :</th><td>'.$rec['plate'].'</td></tr>';
	echo '<tr><th>Make :</th><td>'.$rec['make'].'</td></tr>';
	echo '<tr><th>Model :</th><td>'.$rec['model'].'</td></tr>';
	echo '</table>';
}

 echo '<br/>'.mysqli_num_rows($r).' record(s) found';

 //5.
 mysqli_free_result($r); 
 //"Open connections (and similar resources) are automatically destroyed at the end of script execution. 
 //However, you should still close or free all connections, result sets and statement handles as soon as 
 //they are no longer required. This will help return resources to PHP and MySQL faster."
 
//6. close connection
 mysqli_close($cnn);
?>