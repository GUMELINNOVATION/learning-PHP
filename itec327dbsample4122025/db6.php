<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 <label>
    Search by Product name(Starting with):
    <input type="text" name="nm" maxlength="50" required=''>
 </label><br>
  <button type="submit" name="sbmt">Search</button>
  <br><a href="idx.html">BAck to menu</a><br>
</form>    
</body>
</html>
<?php
if (!isset($_POST['sbmt'])) exit();
//1. connect
$cnn=@mysqli_connect('localhost','uitec327','123456','itec327') or exit('Connection failed:'.mysqli_connect_error());
//2. query
$qry="select pcode,pname,price,expirydate from products where pname like ?";
$stmt=mysqli_stmt_init($cnn) or exit('Statement initialization failed');
mysqli_stmt_prepare($stmt,$qry) or exit('Query error');
$pn=trim(filter_input(INPUT_POST,'nm')).'%';
mysqli_stmt_bind_param($stmt,'s',$pn);
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