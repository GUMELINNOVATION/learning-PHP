<?php
// for strings check the use of FILTER_SANITIZE_STRING
$pl=''; // for direct calls which are neglected throughout the project
if ( isset( $_GET["pl"])) {
    $pl=strtoupper(filter_input(INPUT_GET,'pl'));    
}
elseif(isset($_POST["pl"])){
 $pl=strtoupper(filter_input(INPUT_POST,'pl'));    
}

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

$sth = $cnn->prepare('select * from cars where plate=:pl');
$sth->bindParam(':pl', $pl, PDO::PARAM_STR,6);
$sth->execute();

if (!$row=$sth->fetch(PDO::FETCH_ASSOC))
  die('No such record in my table');
 
// else part
?>
<form name="frm" method="post" action="update.php">
Plate: <input type="text" name="pl" maxlength="6" size="8" readonly="readonly" value="<?php echo $row["plate"];?>"><br/>
Make:  <input type="text" name="mk" maxlength="20" size="24" value="<?php echo $row["make"];?>"><br/>
Model: <input type="text" name="md" maxlength="10" size="12" value="<?php echo $row["model"];?>"><br/>
<input type="reset"> <input type="submit" value="Update">
</form>
<?
//5. close connection
 $cnn=null;
?>
<br/><a href="menu.html">Back to Menu</a>