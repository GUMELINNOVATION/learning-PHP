<?php
$pl=strtoupper(filter_input(INPUT_POST,'pl'));
$slc=filter_input(INPUT_POST,'slc');

if (strlen(trim($pl))<1) exit('Plate can not be blank');// could be removed!

$cnn=@mysqli_connect("localhost","caruser","driver","autos") or exit('Connection failed.'.mysqli_connect_errno());

$query='select * from cars where ';
if ($slc=='E')
 $query.= "plate = ?";
else {
 $query.= "plate like ?";
 $pl.='%';
}
$stmt=mysqli_stmt_init($cnn);

mysqli_stmt_prepare($stmt,$query) or exit('Query Error.'. mysqli_stmt_errno($stmt));
 
@mysqli_stmt_bind_param($stmt,'s',$pl) or exit('Bind Param Error.');// if "or part" & "@" omitted error will be displayed
 
mysqli_stmt_execute($stmt) or exit('Query Execution failed.'. mysqli_stmt_errno($stmt));

$r=mysqli_stmt_get_result($stmt);
 
if ($r->num_rows>1) // if records exist and more than one rec returned
{
	echo '<table border="1"><tr><th>Plate</th><th>Make</th><th>Model</th></tr>';
	while($rec=mysqli_fetch_assoc($r))
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
	$rec=mysqli_fetch_assoc($r);
	echo '<tr><th>Plate :</th><td>'.$rec['plate'].'</td></tr>';
	echo '<tr><th>Make :</th><td>'.$rec['make'].'</td></tr>';
	echo '<tr><th>Model :</th><td>'.$rec['model'].'</td></tr>';
	echo '</table>';
}

 echo '<br/>'.$r->num_rows.' record(s) found';

 
 mysqli_stmt_free_result($stmt); 
 mysqli_stmt_close($stmt);
 mysqli_close($cnn);
?>
<br/><a href="menu.html">Back to Menu</a>