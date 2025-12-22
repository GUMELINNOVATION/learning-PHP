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
    Product name:
    <input type="text" name="nm" maxlength="50">
 </label><br>
<label>
    Product price:
    <input type="number" name="pr" max="99999" min="0">
 </label><br>
  <button type="submit" name="sbmt">Add Record</button>
  <br><a href="idx.html">BAck to menu</a><br>
</form>    
</body>
</html>
<?php
if (!isset($_POST['sbmt'])) exit();
$pname=filter_input(INPUT_POST,"nm");
$pprice=filter_input(INPUT_POST,"pr",FILTER_VALIDATE_INT);

//1. connect
$cnn=@mysqli_connect('localhost','uitec327','123456','itec327') or exit('Connection failed:'.mysqli_connect_error());
//2. query
$qry="insert into products(pname,price) values(?,?)";
$stmt=mysqli_stmt_init($cnn) or exit('Statement initialization failed');
mysqli_stmt_prepare($stmt,$qry) or exit('Query error');
$id=2; // hard coded may be retrieved from an html form as an input
mysqli_stmt_bind_param($stmt,'si',$pname,$pprice);
mysqli_stmt_execute($stmt) or exit("Query execution failed");

if (mysqli_stmt_affected_rows($stmt)>0)
         echo 'Record saved';
     else
         echo 'A problem occured. Specially for update queries! ';
     
mysqli_stmt_close($stmt);
//4. close connection
mysqli_close($cnn);
?>