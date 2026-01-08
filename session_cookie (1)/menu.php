<?php
if (isset($_SESSION["auth"]) && ($_SESSION["auth"]=="OK")){
    echo "You are here";
}
else
 header("location:login.html");
?>