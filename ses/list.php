<?php
if (isset($_COOKIE['nm']))
    echo  "Hello ". $_COOKIE['nm'].'<br>';

if (isset($_SESSION['user']) & ($_SESSION['user']=='valid') ) 
   echo 'Here you are!';
else
  header('location:l.php');
?>