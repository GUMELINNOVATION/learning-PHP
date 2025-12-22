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
    $cnn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

//3. prepare & run query

$sth = $cnn->prepare('update cars set make=:mk,model=:md where plate=:pl');
$sth->bindParam(':pl', $pl, PDO::PARAM_STR,6);
$sth->bindParam(':mk', $mk, PDO::PARAM_STR, 20);
$sth->bindParam(':md', $md, PDO::PARAM_STR, 10);
$sth->execute();

if ($sth->rowCount()>0)
 echo "Record Updated";
else
 echo "Either you did not change any value from any field or something else happened. (Maybe somebody else deleted the record)";

//5. close connection
 $cnn=NULL;
?>
<br/><a href="menu.html">Back to Menu</a>
