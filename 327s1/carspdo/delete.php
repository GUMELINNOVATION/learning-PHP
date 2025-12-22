<?php
$pl= strtoupper(filter_input(INPUT_POST,'pl'));

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

$sth = $cnn->prepare('delete from cars where plate=:pl');
$sth->bindParam(':pl', $pl, PDO::PARAM_STR,6);
$sth->execute();

if ($sth->rowCount()>0)
 echo "Record Deleted";
else
 echo "There is no such plate recorded.";

//5. close connection
 $cnn=NULL;
?>
<br/><a href="menu.html">Back to Menu</a>