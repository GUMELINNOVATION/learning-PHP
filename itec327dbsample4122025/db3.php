<?php
//1. connect
$cnn=@mysqli_connect('localhost','uitec327','123456','itec327') or exit('Connection failed:'.mysqli_connect_error());
//2. query
$qry="select pcode,pname,price,expirydate from products";
$stmt=mysqli_stmt_init($cnn) or exit('Statement initialization failed');
mysqli_stmt_prepare($stmt,$qry) or exit('Query error');
mysqli_stmt_execute($stmt) or exit("Query execution failed");

//3.process the results
$results=mysqli_stmt_get_result($stmt);
echo $results->num_rows.' record(s) found<br/>'; 
// since $result is an object it has number of rows property
// with var_dump($results) you can inspect for further properties/methods available
echo '<table border="1">';
echo "<tr><th>P. Code</th><th>P. Name </th><th>P. Price</th><th>P. Expiration Date</th></tr>";
while ($row=mysqli_fetch_assoc($results)){
    echo "<tr>";
    echo "<td>".$row['pcode']."</td>";
    echo "<td>".$row['pname']."</td>";
    echo "<td>".$row['price']."</td>";
    echo "<td>".$row['expirydate']."</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
//4. close connection
mysqli_close($cnn);
?>