<?php

$bag=@mysqli_connect("localhost","vtkullanici","vtsifre","gym") or exit('Bağlantı hatası:'.mysqli_connect_errno());


$sorgu='select * from paketler';
      
$stmt=mysqli_stmt_init($bag);

 mysqli_stmt_prepare($stmt,$sorgu) or exit('Sorgu hazırlama hatası'. mysqli_stmt_errno($stmt));
 
 mysqli_stmt_execute($stmt) or exit('Sorgu patladı'. mysqli_stmt_errno($stmt));
   
 mysqli_stmt_bind_result($stmt,$padi,$fiy) or exit('Sonuç bağlama hatası.'. mysqli_stmt_errno($stmt));;

echo '<table border="1"><tr><th>Paket Adı</th><th>Fiyat</th></tr>';

while(mysqli_stmt_fetch($stmt)){
		echo '<tr>';
		echo "<td>$padi</td>";
		echo "<td>$fiy</td>";
		echo '</tr>';
 }
echo '</table><br/>';
echo mysqli_stmt_num_rows($stmt).' kayıt bulundu.<br/>'; 

mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);


 mysqli_close($bag);
?>
<br/><a href="menu.html">Menu</a>