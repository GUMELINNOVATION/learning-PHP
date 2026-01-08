<?php
 $pwd=filter_input(INPUT_POST,"pw");
 if ($pwd=="1234"){
    setcookie("auth","OK",time()+3600);
    header("location:menucopy.php");
 }
 else
  header("location:logincopy.html");
?>