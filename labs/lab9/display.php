<?php
$link = mysqli_connect("localhost", "root", "", "db");

if (!$link) {
    die("Connection failed");
}

$sql = "SELECT * FROM students";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Students</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h2>All Students</h2>

<table>
    <tr>
        <th>Student No</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Birthdate</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['studentNO']}</td>
            <td>{$row['name']}</td>
            <td>{$row['surname']}</td>
            <td>" . date("d F Y", strtotime($row['birthday'])) . "</td>
          </tr>";
}

    } else {
        echo "<tr><td colspan='4'>No students found</td></tr>";
    }
    ?>
</table>

<br>
<a href="menu.html">Back to Menu</a>

</body>
</html>
