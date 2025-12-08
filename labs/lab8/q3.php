<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Military Time</title>
</head>
<body>

    <h1>Question 3</h1>

    <form action="q3.php" method="post">
        <label for="time">Select Time:</label>
        <input type="time" name="time" id="time" required>
        <button type="submit">Convert</button>
    </form>

</body>
</html>

<?php
if (isset($_POST['time'])) {
    $time = $_POST['time'];
    $military = str_replace(":", "", $time); 

    echo "<h2>Military Time: $military</h2>";
} else {
    echo "No time selected.";
}
?>

