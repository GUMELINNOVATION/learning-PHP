<?php
//1. connect
$cnn=@mysqli_connect('localhost','uitec327','123456','itec327') or exit('Connection failed:'.mysqli_connect_error());
//2. query
$qry="select * from products";
$res=mysqli_query($cnn,$qry) or exit("Query failed");
//3.process the results
echo mysqli_num_rows($res).' record(s) found.<br/>'; 
echo '<table border="1">';
echo "<tr><th>P. Code</th><th>P. Name </th><th>P. Price</th><th>P. Expiration Date</th></tr>";
while ($row=mysqli_fetch_assoc($res)){
    echo "<tr>";
    echo "<td>".$row['pcode']."</td>";
    echo "<td>".$row['pname']."</td>";
    echo "<td>".$row['price']."</td>";
    echo "<td>".$row['expirydate']."</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_free_result($res);
//4. close connection
mysqli_close($cnn);
?>