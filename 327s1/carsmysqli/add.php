<?php
$pl= strtoupper(filter_input(INPUT_POST,'pl'));
$mk= strtoupper(filter_input(INPUT_POST,'mk'));
$md= strtoupper(filter_input(INPUT_POST,'md'));

if (strlen(trim($pl))<1) exit('Plate can not be blank');

$cnn=@mysqli_connect("localhost","caruser","driver","autos") or exit('Connection failed.'.mysqli_connect_errno());

$query='insert into cars(plate,make,model) values(?,?,?)';
      
$stmt=mysqli_stmt_init($cnn);

 mysqli_stmt_prepare($stmt,$query) or exit('Query Error.'. mysqli_stmt_errno($stmt));
 
 @mysqli_stmt_bind_param($stmt,'sss',$pl,$mk,$md) or exit('Bind Param Error.'); // if "or part" & "@" omitted error will be displayed
 
 mysqli_stmt_execute($stmt) or exit('Query Execution failed.'. mysqli_stmt_errno($stmt));
   

 if (mysqli_stmt_affected_rows($stmt)>0) echo "Record Saved.";


mysqli_stmt_close($stmt);


 mysqli_close($cnn);
?>
<br/><a href="menu.html">Back to Menu</a>