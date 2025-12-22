<?php
$pl= strtoupper(filter_input(INPUT_POST,'pl'));
$mk= strtoupper(filter_input(INPUT_POST,'mk'));
$md= strtoupper(filter_input(INPUT_POST,'md'));

if (strlen(trim($pl))<1) exit('Plate can not be blank'); // could be removed.

$cnn=@mysqli_connect("localhost","caruser","driver","autos") or exit('Connection failed.'.mysqli_connect_errno());

$query='update cars set make=?,model=? where plate=?';
      
$stmt=mysqli_stmt_init($cnn);

 mysqli_stmt_prepare($stmt,$query) or exit('Query Error.'. mysqli_stmt_errno($stmt));
 
 @mysqli_stmt_bind_param($stmt,'sss',$mk,$md,$pl) or exit('Bind Param Error.'); // if "or part" & "@" omitted error will be displayed
 
 mysqli_stmt_execute($stmt) or exit('Query Execution failed.'. mysqli_stmt_errno($stmt)); 
   

 if (mysqli_stmt_affected_rows($stmt)>0) echo "Record updated.";

mysqli_stmt_close($stmt);


 mysqli_close($cnn);
?>
<br/><a href="menu.html">Back to Menu</a>