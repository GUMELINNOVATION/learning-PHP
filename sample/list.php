<?php
//1. connect
$cnn=mysqli_connect("localhost","caruser","driver","autos");

// Check connection
if (mysqli_connect_errno($cnn))
 {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
 }
 

//3. prepare & run query
$q="select * from cars";

$r=mysqli_query($cnn,$q) or die('Query failed');

//4. list items
if (mysqli_num_rows($r)>0) // if records exist
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

	echo '</table><br/>';
}
 echo mysqli_num_rows($r).' record(s) found';
 
 //5. 
 mysqli_free_result($r); 
 
//6. close connection
 mysqli_close($cnn);
?>