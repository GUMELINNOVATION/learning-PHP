<?php
$pcode=filter_input(INPUT_POST,"pcode");
$pname=filter_input(INPUT_POST,"nm");
$pprice=filter_input(INPUT_POST,"pr",FILTER_VALIDATE_INT);

//1. connect
$cnn=@mysqli_connect('localhost','uitec327','123456','itec327') or exit('Connection failed:'.mysqli_connect_error());
//2. query
$qry="update products set pname=?,price=? where pcode=?";
$stmt=mysqli_stmt_init($cnn) or exit('Statement initialization failed');
mysqli_stmt_prepare($stmt,$qry) or exit('Query error');
$id=2; // hard coded may be retrieved from an html form as an input
mysqli_stmt_bind_param($stmt,'sii',$pname,$pprice,$pcode);
mysqli_stmt_execute($stmt) or exit("Query execution failed");

if (mysqli_stmt_affected_rows($stmt)>0)
         echo 'Record Updated';
     else
         echo 'A problem occured. Specially for update queries! ';
     
mysqli_stmt_close($stmt);
//4. close connection
mysqli_close($cnn);
?>
<br><a href="idx.html">BAck to menu</a><br>