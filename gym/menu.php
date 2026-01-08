<?php
if (!isset($_SESSION["auth"]) && ($_SESSION["auth"]!=1)){
    header("location:login.html");
    exit;
}  
?>
"Here is your menu"