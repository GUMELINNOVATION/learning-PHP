<?php
$pl= strtoupper(filter_input(INPUT_POST,'pl'));
$mk= strtoupper(filter_input(INPUT_POST,'mk'));
$md= strtoupper(filter_input(INPUT_POST,'md'));

if (strlen(trim($pl))<1) exit('Plate can not be blank');


//1. connect & select db to work on
$dsn = 'mysql:dbname=autos;host=localhost';
$user = 'caruser';
$password = 'driver';

try {
    $cnn = new PDO($dsn, $user, $password);
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}


//3. prepare & run query

$sth = $cnn->prepare('insert into cars(plate,make,model) values(:pl,:mk,:md)');
$sth->bindParam(':pl', $pl, PDO::PARAM_STR,6);
$sth->bindParam(':mk', $mk, PDO::PARAM_STR, 20);
$sth->bindParam(':md', $md, PDO::PARAM_STR, 10);
$sth->execute();

if ($sth->rowCount()>0)
 echo "Record Saved";
else
 echo "Something else happened";

//5. close connection
 $cnn=NULL;
?>
<br/><a href="menu.html">Back to Menu</a>