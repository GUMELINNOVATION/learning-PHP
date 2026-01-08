<?php
//1. connect
$cnn=mysqli_connect("localhost","caruser","driver","autos");

// Check connection
if (mysqli_connect_errno($cnn))
 {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
 } 
 
//2. prepare & run query
$q="select * from cars";
$r=mysqli_query($cnn,$q) or die('Query failed'.mysqli_error($cnn));

//3. list items
if (mysqli_num_rows($r)>0) // if records exist
{
	echo '<table border="1"><tr><th>Delete</th><th>Update</th><th>Plate</th><th>Make</th><th>Model</th></tr>';
	while($rec=mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
		echo '<tr>';
		echo '<td><a href="delfromlist.php?pl='.$rec['plate'].'">Delete</a></td>';
		echo '<td><a href="edit.php?pl='.$rec['plate'].'">Edit</a></td>';

		echo '<td>'.$rec['plate'].'</td>';
		echo '<td>'.$rec['make'].'</td>';
		echo '<td>'.$rec['model'].'</td>';
		echo '</tr>';
	}

	echo '</table><br/>';
}
 echo mysqli_num_rows($r).' record(s) found';
 // 4. 
 mysqli_free_result($r); 
 
//5. close connection
 mysqli_close($cnn);
?>