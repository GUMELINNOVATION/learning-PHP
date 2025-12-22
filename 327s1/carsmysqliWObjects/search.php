<?php
$pl=strtoupper(filter_input(INPUT_POST,'pl'));
$slc=filter_input(INPUT_POST,'slc');

if (strlen(trim($pl))<1) exit('Plate can not be blank');// could be removed!

@$cnn = new mysqli('localhost', 'caruser', 'driver', 'autos');


if ($cnn->connect_error) {
    exit('Connect Error (' . $cnn->connect_errno . ') '. $cnn->connect_error);
}

$query='select * from cars where ';
if ($slc=='E')
 $query.= "plate = ?";
else {
 $query.= "plate like ?";
 $pl.='%';
}

$stmt=$cnn->stmt_init();
$stmt->prepare($query) or exit('Query Error.'. $cnn->errno);
@$stmt->bind_param('s',$pl) or exit('Bind Param Error.');
$stmt->execute() or exit('Query Execution failed.'. $cnn->errno);
$r=$stmt->get_result();
 
if ($r->num_rows>1) // if records exist and more than one rec returned
{
	echo '<table border="1"><tr><th>Plate</th><th>Make</th><th>Model</th></tr>';
	while($rec=$r->fetch_assoc())
	{
		echo '<tr>';
		echo '<td>'.$rec['plate'].'</td>';
		echo '<td>'.$rec['make'].'</td>';
		echo '<td>'.$rec['model'].'</td>';
		echo '</tr>';
	}

	echo '</table>';
}
elseif ($r->num_rows==1) // if just one record
{
	echo '<table border="0">';
	$rec=$r->fetch_assoc();
	echo '<tr><th>Plate :</th><td>'.$rec['plate'].'</td></tr>';
	echo '<tr><th>Make :</th><td>'.$rec['make'].'</td></tr>';
	echo '<tr><th>Model :</th><td>'.$rec['model'].'</td></tr>';
	echo '</table>';
}

 echo '<br/>'.$r->num_rows.' record(s) found';

 
   $stmt->free_result();
   $stmt->close();
   $cnn->close(); 
?>
<br/><a href="menu.html">Back to Menu</a>