<?php
//1. connect
$cnn=@mysqli_connect('localhost','uitec327','123456','itec327') or exit('Connection failed:'.mysqli_connect_error());
//2. query
$qry="select pcode,pname,price,expirydate from products where pcode=?";
$stmt=mysqli_stmt_init($cnn) or exit('Statement initialization failed');
mysqli_stmt_prepare($stmt,$qry) or exit('Query error');
$id=filter_input(INPUT_GET,'pcode',FILTER_VALIDATE_INT);
mysqli_stmt_bind_param($stmt,'i',$id);
mysqli_stmt_execute($stmt) or exit("Query execution failed");

//3.process the results
$results=mysqli_stmt_get_result($stmt);

if ($results->num_rows!=1) exit('Record not found');

$row=mysqli_fetch_assoc($results)
?>
    
    
 <form method="post" action="db9.php">
 <label>
    Product Code:
    <input type="text" name="pcode" readonly="" value="<?php echo $row['pcode'];?>">
 </label><br>
 <label>
    Product Name:
    <input type="text" name="nm" maxlength="50" required='' value="<?php echo $row['pname'];?>">
 </label><br>
 <label>
    Product Price:
    <input type="number" name="pr" max="99999" required='' value="<?php echo $row['price'];?>">
 </label><br>
 <label>
    Expiration Date:
    <input type="text" readonly="" value="<?php echo $row['expirydate'];?>">
 </label><br>
  <button type="submit" name="sbmt">Update</button>
  <br><a href="idx.html">BAck to menu</a><br>
</form> 
<?php

    

mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
//4. close connection
mysqli_close($cnn);
?>