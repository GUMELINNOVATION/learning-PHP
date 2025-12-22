<?php

$cnn=@mysqli_connect("localhost","caruser","driver","autos") or exit('Connection failed.'.mysqli_connect_errno());

$query='select plate,make,model from cars';
      
$stmt=mysqli_stmt_init($cnn);

 mysqli_stmt_prepare($stmt,$query) or exit('Query Error.'. mysqli_stmt_errno($stmt));
 
 mysqli_stmt_execute($stmt) or exit('Query Execution failed.'. mysqli_stmt_errno($stmt));
   
 mysqli_stmt_bind_result($stmt,$pl,$mk,$md) or exit('Result storage failed.'. mysqli_stmt_errno($stmt));

echo '<table border="1"><tr><th>Delete</th><th>Update</th><th>Plate</th><th>Make</th><th>Model</th></tr>';

while(mysqli_stmt_fetch($stmt)){
		echo '<tr>';
		echo '<td><a href="delfromlist.php?pl='.$pl.'">Delete</a></td>';
		echo '<td><a href="edit.php?pl='.$pl.'">Edit</a></td>';
                echo "<td>$pl</td>";
		echo "<td>$mk</td>";
		echo "<td>$md</td>";
		echo '</tr>';
 }
echo '</table><br/>';
echo mysqli_stmt_num_rows($stmt).' records found<br/>'; 

mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);


 mysqli_close($cnn);
?>
<br/><a href="menu.html">Back to Menu</a>