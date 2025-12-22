<?php
@$cnn = new mysqli('localhost', 'caruser', 'driver', 'autos');


if ($cnn->connect_error) {
    exit('Connect Error (' . $cnn->connect_errno . ') '. $cnn->connect_error);
}

$query='select plate,make,model from cars';
$stmt=$cnn->stmt_init();
$stmt->prepare($query) or exit('Query Error.'. $cnn->errno);
$stmt->execute() or exit('Query Execution failed.'. $cnn->errno);
@$stmt->bind_result($pl,$mk,$md) or exit('Result storage failed.'. $cnn->errno);

echo '<table border="1"><tr><th>Delete</th><th>Update</th><th>Plate</th><th>Make</th><th>Model</th></tr>';

   while($stmt->fetch()){
		echo '<tr>';
		echo '<td><a href="delfromlist.php?pl='.$pl.'">Delete</a></td>';
		echo '<td><a href="edit.php?pl='.$pl.'">Edit</a></td>';
                echo "<td>$pl</td>";
		echo "<td>$mk</td>";
		echo "<td>$md</td>";
		echo '</tr>';
 }
echo '</table><br/>';

   while($stmt->fetch()){
    echo "$pl $mk $md <br/>";
   }
   echo $stmt->num_rows.' records found';
   $stmt->free_result();
   $stmt->close();
   $cnn->close(); 
   
      
?>
<br/><a href="menu.html">Back to Menu</a>