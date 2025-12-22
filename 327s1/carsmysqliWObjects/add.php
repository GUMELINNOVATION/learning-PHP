<?php
$pl= strtoupper(filter_input(INPUT_POST,'pl'));
$mk= strtoupper(filter_input(INPUT_POST,'mk'));
$md= strtoupper(filter_input(INPUT_POST,'md'));

if (strlen(trim($pl))<1) exit('Plate can not be blank');

     
@$cnn = new mysqli('localhost', 'caruser', 'driver', 'autos');


if ($cnn->connect_error) {
    exit('Connect Error (' . $cnn->connect_errno . ') '. $cnn->connect_error);
}

$query='insert into cars(plate,make,model) values(?,?,?)';
$stmt=$cnn->stmt_init();
$stmt->prepare($query) or exit('Query Error.'. $cnn->errno);
@$stmt->bind_param('sss',$pl,$mk,$md) or exit('Bind Param Error.');
$stmt->execute() or exit('Query Execution failed.'. $cnn->errno);

if ($stmt->affected_rows>0) echo "Record Saved.";

$stmt->close();
$cnn->close(); 
   
      
?>
<br/><a href="menu.html">Back to Menu</a>