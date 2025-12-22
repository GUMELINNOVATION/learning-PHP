<?php
// for strings check the use of FILTER_SANITIZE_STRING
$pl=''; // for direct calls which are neglected throughout the project
if ( isset( $_GET["pl"])) {
    $pl=strtoupper(filter_input(INPUT_GET,'pl'));    
}
elseif(isset($_POST["pl"])){
 $pl=strtoupper(filter_input(INPUT_POST,'pl'));    
}

if (strlen(trim($pl))<1) exit('Plate can not be blank'); // could be removed.

$cnn=@mysqli_connect("localhost","caruser","driver","autos") or exit('Connection failed.'.mysqli_connect_errno());

$query='select * from cars where plate=?';
      
$stmt=mysqli_stmt_init($cnn);

 mysqli_stmt_prepare($stmt,$query) or exit('Query Error.'. mysqli_stmt_errno($stmt));
 
 @mysqli_stmt_bind_param($stmt,'s',$pl) or exit('Bind Param Error.'); // if "or part" & "@" omitted error will be displayed
 
 mysqli_stmt_execute($stmt) or exit('Query Execution failed.'. mysqli_stmt_errno($stmt));
   
 mysqli_stmt_bind_result($stmt,$pl,$mk,$md) or exit('Result storage failed.'. mysqli_stmt_errno($stmt));

 

mysqli_stmt_fetch($stmt) or exit('No record found.');
		
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);


mysqli_close($cnn);
?>
<form name="frm" method="post" action="update.php">
Plate: <input type="text" name="pl" maxlength="6" size="8" readonly="readonly" value="<?php echo $pl;?>"><br/>
Make:  <input type="text" name="mk" maxlength="20" size="24" value="<?php echo $mk;?>"><br/>
Model: <input type="text" name="md" maxlength="10" size="12" value="<?php echo $md;?>"><br/>
<input type="reset"> <input type="submit" value="Update">
</form>
<br/><a href="menu.html">Back to Menu</a>