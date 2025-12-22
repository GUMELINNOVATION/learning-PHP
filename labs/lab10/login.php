 <?php
if (isset($_POST['login']) && !empty($_POST['username'])){
$con = mysqli_connect("localhost", "root", "", "db1");

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE user='$username' AND password='$password'";
$result = mysqli_query($con, $sql);

if ($result->num_rows === 1) {
    header("Location: menu.php");
} else {
    echo "Invalid username or password.";
}

mysqli_close($con);
}
?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB 10</title>
</head>
<body>
    <form action="login.php" method="POST">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" name="login" value="Login">
    </form>
    
</body>
</html>


