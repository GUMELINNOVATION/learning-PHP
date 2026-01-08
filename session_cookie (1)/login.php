<?php
 $pwd=filter_input(INPUT_POST,"pw");
 if ($pwd=="1234"){
    $_SESSION["auth"]="OK";
    header("location:menu.php");
 }
 else
  header("location:login.html");
?>