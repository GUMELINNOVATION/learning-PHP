<?php
// process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username']; 
    echo "Hello, " . htmlspecialchars($name);
}
?>