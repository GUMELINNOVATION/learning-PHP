<?php
//1. connect & select db to work on
$dsn = 'mysql:dbname=autos;host=localhost';
$user = 'caruser';
$password = 'driver';

try {
    $cnn = new PDO($dsn, $user, $password);
    $cnn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

//3. prepare & run query
$sth = $cnn->prepare('select * from cars');
$sth->execute();


//4. list items
 $rows=$sth->fetchAll(PDO::FETCH_ASSOC); //and  via sizeof($rows) you can detect the number of records returned.
// or while ($row=$sth->fetch()) and loop through each item most efficient way.
if ($sth->rowCount()>0) // if records exist can not be relied on not all dbs are supporting this
{

	echo '<table border="1"><tr><th>Delete</th><th>Update</th><th>Plate</th><th>Make</th><th>Model</th></tr>';
	foreach ($rows as $rec)
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
 echo sizeof($rows).' record(s) found';
//5. close connection
 $cnn=null;
?>
<br/><a href="menu.html">Back to Menu</a>