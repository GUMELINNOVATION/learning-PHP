<?php
$pl=strtoupper(filter_input(INPUT_POST,'pl'));
$slc=filter_input(INPUT_POST,'slc');

if (strlen(trim($pl))<1) exit('Plate can not be blank');

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

$q="select * from cars where ";

if ($slc=='E')
 $q.= "plate=:pl";
else // for S
{
 $q.= "plate like :pl";
 $pl.='%';
}

$sth = $cnn->prepare($q);
$sth->bindParam(':pl', $pl, PDO::PARAM_STR,6);
$sth->execute();


//4. list items
 $rows=$sth->fetchAll(PDO::FETCH_ASSOC); //and  via sizeof($rows) you can detect the number of records returned.
// or while ($row=$sth->fetch) and loop through each item most efficient way.

//4. list items
if (sizeof($rows)>1) // if records exist
{
	echo '<table border="1"><tr><th>Plate</th><th>Make</th><th>Model</th></tr>';
	foreach($rows as $rec)
	{
		echo '<tr>';
		echo '<td>'.$rec['plate'].'</td>';
		echo '<td>'.$rec['make'].'</td>';
		echo '<td>'.$rec['model'].'</td>';
		echo '</tr>';
	}

	echo '</table>';
}
if (sizeof($rows)==1) // if just one record
{
	echo '<table border="0">';
	echo '<tr><th>Plate :</th><td>'.$rows[0]['plate'].'</td></tr>';
	echo '<tr><th>Make :</th><td>'.$rows[0]['make'].'</td></tr>';
	echo '<tr><th>Model :</th><td>'.$rows[0]['model'].'</td></tr>';
	echo '</table>';
}

 echo '<br/>'.sizeof($rows).' record(s) found';

//5. close connection
 $cnn=null;
?>
<br/><a href="menu.html">Back to Menu</a>