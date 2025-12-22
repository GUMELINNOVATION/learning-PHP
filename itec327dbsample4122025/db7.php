<?php
//1. connect
$cnn=@mysqli_connect('localhost','uitec327','123456','itec327') or exit('Connection failed:'.mysqli_connect_error());
//2. query
$qry="select pcode,pname,price,expirydate from products";
$stmt=mysqli_stmt_init($cnn) or exit('Statement initialization failed');
mysqli_stmt_prepare($stmt,$qry) or exit('Query error');
mysqli_stmt_execute($stmt) or exit("Query execution failed");

//3.process the results
mysqli_stmt_bind_result($stmt,$c,$n,$p,$e);
// echo mysqli_stmt_num_rows($stmt).' record(s) found.<br/>'; error here always returns 0
echo '<table border="1">';
echo "<tr><th>P. Code</th><th>P. Name </th><th>P. Price</th><th>P. Expiration Date</th><th>Operations</th></tr>";
while(mysqli_stmt_fetch($stmt)){
    echo "<tr>";
    echo "<td>".$c."</td>";
    echo "<td>".$n."</td>";
    echo "<td>".$p."</td>";
    echo "<td>".$e."</td>";
    echo '<td><a href="db8.php?pcode='.$c.'">Edit</a></td>';
    echo "</tr>";
}
echo "</table>";
echo mysqli_stmt_num_rows($stmt).' record(s) found.<br/>'; 
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
mysqli_close($cnn);
?>
<br><a href="idx.html">BAck to menu</a><br>