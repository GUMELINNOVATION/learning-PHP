<?php
$un=strtoupper(filter_input(INPUT_POST,'un'));
$pw=filter_input(INPUT_POST,'pw');


$cnn=@mysqli_connect("localhost","dbuser","dbpass","gym") or exit('Connection failed.'.mysqli_connect_errno());

$query='select username from clients where username=? and password=?';
$stmt=mysqli_stmt_init($cnn);
mysqli_stmt_prepare($stmt,$query) or exit('Query Error.'. mysqli_stmt_errno($stmt));
 
@mysqli_stmt_bind_param($stmt,'ss',$un,$pw) or exit('Bind Param Error.');// if "or part" & "@" omitted error will be displayed
 
mysqli_stmt_execute($stmt) or exit('Query Execution failed.'. mysqli_stmt_errno($stmt));

$r=mysqli_stmt_get_result($stmt);
 
if ($r->num_rows==1)
    $userisok=true;
else
  $userisok=false;
	
 mysqli_stmt_free_result($stmt); 
 mysqli_stmt_close($stmt);
 mysqli_close($cnn);

if ($userisok==true){
    $_SESSION["auth"]=1;
    header("location:menu.php");
}
else
  header("location:login.html");
?>