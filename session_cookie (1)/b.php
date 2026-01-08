<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="a.php" method="post">
       <input type="number" name="n1" required="">
       /
       <input type="number" name="n2" required="">
       <button type="submit">=</button>
    </form>
<?php
for($i=10;$i>0;$i--)
  for($j=5;$j>0;$j--){
    echo '<form action="a.php" method="post">';
    echo  '<input type="hidden" name="n1" value="'.$i.'">';
    echo  '<input type="hidden" name="n2" value="'.$j.'">';
    echo  '<button type="submit">'.$i.'/'.$j.'</button>';
    echo '</form><br/>';
  }
   //echo "<a href=\"a.php?n1=$i&n2=$j\">$i/$j</a><br/>";
?>
</body>
</html>