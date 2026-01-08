<?php
if (isset($_COOKIE["auth"]) && ($_COOKIE["auth"]=="OK")){
    echo "You are here";
}
else
 header("location:logincopy.html");
?>