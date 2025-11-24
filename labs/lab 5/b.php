<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>B.php (GET Method)</title>
</head>
<body>

<h2>Search Results</h2>

<!-- <?php
 $database = $_GET['Database'];
$record = $_GET['records'];
$display = $_GET['display'];
$word1 = $_GET['word1'];
$word2 = $_GET['word2'];
$word3 =$_GET['word3'];
$opration =  $_GET['operator'];

 echo "you search for $database which was a $display
  search with $record per sheet where where the
   search criteria is : $word1 $word2 and $word3 could not find any result" ;
?> -->




</body>
</html>




<?php
$max=10;
$nonalpha=rand(1,($max-2));
$capletter=rand(1,($max-(1+$nonalpha)));
$smallchar=rand(1,($max-($nonalpha+$capletter)));

echo "NonAlpha=$nonalpha Capital=$capletter Small=$smallchar";

$nA=array(1,2,3,4,5,6,7,8,9,0,"!","?",".","$");
$cl="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$sl=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

for($i=1;$i<=$nonalpha;$i++){
  $num=rand(0,(count($nA)-1));
  $pwd[]=$nA[$num];
}

for($i=1;$i<=$capletter;$i++){
  $num=rand(0,(strlen($cl)-1));
  $pwd[]=$cl[$num];
}

for($i=1;$i<=$smallchar;$i++){
  $num=rand(0,(count($sl)-1));
  $pwd[]=$sl[$num];
}

shuffle($pwd);
echo "<br/>".implode("",$pwd);

?>
SimplyCodes

Click to switch to the original text.Click to Translate Page.SettingsPDF Translate
