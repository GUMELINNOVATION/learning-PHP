<?php
$padi= strtoupper(filter_input(INPUT_POST,'padi'));
$pfiyat= filter_input(INPUT_POST,'pfiyat',FILTER_VALIDATE_INT);


if (strlen(trim($padi))==0) exit('Paket adı girilmelidir');

$bag=@mysqli_connect("localhost","vtkullanici","vtsifre","gym") or exit('Bağlantı hatası:'.mysqli_connect_errno());

$sorgu='insert into paketler(adi,fiyat) values(?,?)';
      
$stmt=mysqli_stmt_init($bag);

 mysqli_stmt_prepare($stmt,$sorgu) or exit('Sorgu hazırlama hatası.'. mysqli_stmt_errno($stmt));
 
 @mysqli_stmt_bind_param($stmt,'si',$padi,$pfiyat) or exit('Parametre bağlama hatası'); // if "or part" & "@" omitted error will be displayed
 
 mysqli_stmt_execute($stmt) or exit('Sorgu hatası.'. mysqli_stmt_error($stmt));
   

 if (mysqli_stmt_affected_rows($stmt)>0) 
   echo "Kayıt yapıldı.";
 else
   echo "Ayva";


mysqli_stmt_close($stmt);


 mysqli_close($bag);
?>
<br/><a href="menu.html">Menüye dön</a>