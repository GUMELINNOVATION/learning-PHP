<?php
$_SESSION=array();
session_destroy();
setcookie('nm','',time()-3600);
?>