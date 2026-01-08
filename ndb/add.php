<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST["sbmt"])){
    @$cnn=new mysqli('localhost','usx','123456','usx');
    if ($cnn->connect_error) {
        exit('Connect Error (' . $cnn->connect_errno . ') '. $cnn->connect_error);
    }

    $query='insert into nums(n) values(?)';  
    $stmt=$cnn->stmt_init();
    $stmt->prepare($query) or exit('Query Error.'. $cnn->errno);
    $stmt->bind_param('i',$n) or exit('Bind Param Error.');
    $ns=filter_input(INPUT_POST,'ns',FILTER_VALIDATE_INT);
    for($i=1;$i<=$ns;$i++){
        $n=rand(0,99);
        $stmt->execute() or exit('Query Execution failed.'. $cnn->errno);    
        if ($stmt->affected_rows==0) exit('Error'); 
    }
    $stmt->close(); 
    $cnn->close();
    echo "<br>$ns records added<br>"; 
}
?>    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
    <label>
        Number of records to Add:
        <input type='number' value="10" max="99" min="0" name="ns">
    </label><br/>
    <button type="submit" name="sbmt">Submit</button>
    </form>
</body>
</html>