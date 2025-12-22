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

@$cnn = new mysqli('localhost', 'caruser', 'driver', 'autos');


if ($cnn->connect_error) {
    exit('Connect Error (' . $cnn->connect_errno . ') '. $cnn->connect_error);
}

$query='select * from cars where plate=?';
$stmt=$cnn->stmt_init();
$stmt->prepare($query) or exit('Query Error.'. $cnn->errno);
@$stmt->bind_param('s',$pl) or exit('Bind Param Error.');

$stmt->execute() or exit('Query Execution failed.'. $cnn->errno);

@$stmt->bind_result($pl,$mk,$md) or exit('Result storage failed.'. $cnn->errno);

$stmt->fetch() or exit('No record found.');
		
   $stmt->free_result();
   $stmt->close();
   $cnn->close();
?>
<form name="frm" method="post" action="update.php">
Plate: <input type="text" name="pl" maxlength="6" size="8" readonly="readonly" value="<?php echo $pl;?>"><br/>
Make:  <input type="text" name="mk" maxlength="20" size="24" value="<?php echo $mk;?>"><br/>
Model: <input type="text" name="md" maxlength="10" size="12" value="<?php echo $md;?>"><br/>
<input type="reset"> <input type="submit" value="Update">
</form>
<br/><a href="menu.html">Back to Menu</a>