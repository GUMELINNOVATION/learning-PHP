<?php
// Handle login BEFORE any HTML output
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "password123") {
        header("Location: https://sct.emu.edu.tr");
        exit;
    } else {
        $error = "Invalid username or password. Please try again.";
    }
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
    <div>
        <h1>Question 2</h1>

        <form action="q2.php" method="post">
            <label>Login system</label>
            <br>

            <label for="username">Username:</label>
            <input type="text" name="username">
            <br>

            <label for="password">Password:</label>
            <input type="password" name="password">
            <br>

            <input type="submit" name="login" value="SIGN IN">
        </form>

        <!-- Print error message if login fails -->
        <?php if (!empty($error)) echo "<p>$error</p>"; ?>
    </div>

</body>
</html>
