<?php
$pl=$_REQUEST['pl'];


if (strlen(trim($pl))==0)
 die("Plate can not be blank");


//1. connect
$cnn=mysqli_connect("localhost","caruser","driver","autos");

// Check connection
if (mysqli_connect_errno($cnn))
 {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
 } 

//2. prepare & run query
$q="select * from cars where plate='$pl'";

$r=mysqli_query($cnn,$q) or die('Query failed. '.mysqli_error($cnn));

if (mysqli_num_rows($r)==0)
 die('No such record in my table');
 
// else part
$row=mysqli_fetch_assoc($r);
?>
<form name="frm" method="post" action="update.php">
Plate: <input type="text" name="pl" maxlength="6" size="8" readonly="readonly" value="<?php echo $row["plate"];?>"><br/>
Make:  <input type="text" name="mk" maxlength="20" size="24" value="<?php echo $row["make"];?>"><br/>
Model: <input type="text" name="md" maxlength="10" size="12" value="<?php echo $row["model"];?>"><br/>
<input type="reset"> <input type="submit" value="Update">
</form>
<?

 // 4. 
 mysqli_free_result($r); 
 
//5. close connection
 mysql_close($cnn);
?>