<?php
@$cnn=new mysqli('localhost','usx','123456','usx');
if ($cnn->connect_error) {
    exit('Connect Error (' . $cnn->connect_errno . ') '. $cnn->connect_error);
}


$query='select n from nums';  
$stmt=$cnn->stmt_init();
$stmt->prepare($query) or exit('Query Error.'. $cnn->errno);
$stmt->execute() or exit('Query Execution failed.'. $cnn->errno);    

$stmt->bind_result($n);
echo '<table border="1"><tr><th>N</th></tr>';
while($stmt->fetch())
  echo "<tr><td>$n</td></tr>";
echo '</table>';
echo $stmt->num_rows." records found"; 
  
$stmt->close(); 
$cnn->close(); 
?>
