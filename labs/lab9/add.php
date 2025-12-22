<?php
$link = mysqli_connect("localhost", "root", "", "db");

if (!$link) {
    die("Connection failed");
}

if (isset($_POST['add'])) {
    $student_no = $_POST['student_no'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthdate = $_POST['birthdate'];

    $sql = "INSERT INTO students VALUES (?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("isss", $student_no, $name, $surname, $birthdate);
    $stmt->execute();

    $message = "Student added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .container {
            width: 350px;
            margin: 80px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px #ccc;
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin: 6px 0 15px 0;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        .message {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Student</h2>

    <?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>

    <form method="post">
        Student No:
        <input type="number" name="student_no" required>

        Name:
        <input type="text" name="name" required>

        Surname:
        <input type="text" name="surname" required>

        Birthdate:
        <input type="date" name="birthdate" required>

        <input type="submit" name="add" value="Add Student">
    </form>

    <a href="menu.html">Back to Menu</a>
</div>

</body>
</html>
