<?php
session_start();
include 'conn.php';

if (isset($_POST['submit'])) {

    $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $Q = "SELECT * FROM test_db WHERE user = ? and password = ?";
    $stmt = mysqli_prepare($conn, $Q);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
        mysqli_stmt_execute($stmt);
        $R = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($R) == 1) {
            $_SESSION["auth"] = 1;
            header("Location:menu.php");
            
            exit;
        } else {
            echo "Invalid username or password.";
            header("Location:test.php");
            
            exit;
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login</h1>
    <form action="test.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        
       <button type="submit" name="submit">Login</button>

    </form>
</body>
</html>
