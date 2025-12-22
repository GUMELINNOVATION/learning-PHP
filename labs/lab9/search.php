<?php
$link = mysqli_connect("localhost", "root", "", "db");

if (!$link) {
    die("Connection failed");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Student</title>
</head>
<body>

<h2>Search Student</h2>

<form method="get">
    <select name="search_by">
        <option value="studentNo">Student No</option>
        <option value="name">Name</option>
        <option value="surname">Surname</option>
        <option value="birthday">Birthday</option>
    </select>
    <input type="text" name="search_value" placeholder="Search..." required>
    <input type="submit" value="Search">
</form>

<hr>

<?php
$sql = "SELECT * FROM students WHERE 1";

if (!empty($_GET['search_by']) && !empty($_GET['search_value'])) {
    $searchBy = $_GET['search_by'];
    $value = $_GET['search_value'];

    if ($searchBy === "studentNo") {
         $sql = "SELECT * FROM students WHERE studentNo = '$value'";
    } elseif ($searchBy === "birthday") {
        $sql = "SELECT * FROM students WHERE birthday = '$value'";
    } else {
        $sql .= " AND $searchBy LIKE '%" . mysqli_real_escape_string($link, $value) . "%'";
    }
}

$result = mysqli_query($link, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Student No</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Birthday</th>
            </tr>";

   while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['studentNO']}</td>
            <td>{$row['name']}</td>
            <td>{$row['surname']}</td>
            <td>" . date("d F Y", strtotime($row['birthday'])) . "</td>
          </tr>";
}


    echo "</table>";
} else {
    echo "No student found.";
}
?>

<br>
<a href="menu.html">Back to Menu</a>

</body>
</html>
