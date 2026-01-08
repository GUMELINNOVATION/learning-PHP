# Detailed Guide to CRUD Operations in PHP

This guide provides a detailed walkthrough of Create, Read, Update, and Delete (CRUD) operations using PHP with both **PDO** and **MySQLi**. The examples are based on the `cars` database from your project.

---

## Part 1: The "Create" Operation (Adding Data)

The "Create" operation involves adding new data to your database. This is typically done using an HTML form that sends data to a PHP script.

### Step 1: The HTML Form (`add.html`)

This form collects the car's Plate, Make, and Model from the user. When submitted, it sends the data to `add.php` using the `POST` method.

```html
<!DOCTYPE html>
<html>
<head>
    <title>Add Car</title>
</head>
<body>
    <form name="frm" method="post" action="add.php">
        Plate: <input type="text" name="pl" maxlength="6" size="8" required=""><br/>
        Make:  <input type="text" name="mk" maxlength="20" size="24" ><br/>
        Model: <input type="text" name="md" maxlength="10" size="12"><br/>
        <input type="submit" value="Save">
    </form>
    <br/><a href="menu.html">Back to Menu</a>   
</body>
</html>
```

### Step 2: The PHP Script (`add.php`)

This script receives the data from the form and inserts it into the `cars` table.

#### PDO Example (`327s1/carspdo/add.php`)

```php
<?php
// 1. Get data from form and sanitize it
$pl = strtoupper(filter_input(INPUT_POST, 'pl'));
$mk = strtoupper(filter_input(INPUT_POST, 'mk'));
$md = strtoupper(filter_input(INPUT_POST, 'md'));

// Basic validation
if (strlen(trim($pl)) < 1) {
    exit('Plate can not be blank');
}

// 2. Connect to the database
$dsn = 'mysql:dbname=autos;host=localhost';
$user = 'caruser';
$password = 'driver';

try {
    $cnn = new PDO($dsn, $user, $password);
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// 3. Prepare and execute the INSERT statement
$sql = 'INSERT INTO cars(plate, make, model) VALUES(:pl, :mk, :md)';
$sth = $cnn->prepare($sql);

// 4. Bind parameters to prevent SQL injection
$sth->bindParam(':pl', $pl, PDO::PARAM_STR);
$sth->bindParam(':mk', $mk, PDO::PARAM_STR);
$sth->bindParam(':md', $md, PDO::PARAM_STR);

// 5. Execute and check for success
if ($sth->execute()) {
    echo "Record Saved";
} else {
    echo "Something went wrong";
}

// 6. Close the connection
$cnn = null;
?>
```

#### MySQLi Example (`327s1/carsmysqli/add.php`)

```php
<?php
// 1. Get data from form and sanitize it
$pl = strtoupper(filter_input(INPUT_POST, 'pl'));
$mk = strtoupper(filter_input(INPUT_POST, 'mk'));
$md = strtoupper(filter_input(INPUT_POST, 'md'));

if (strlen(trim($pl)) < 1) {
    exit('Plate can not be blank');
}

// 2. Connect to the database
$cnn = @mysqli_connect("localhost", "caruser", "driver", "autos");
if (!$cnn) {
    exit('Connection failed: ' . mysqli_connect_error());
}

// 3. Prepare the INSERT statement
$query = 'INSERT INTO cars(plate, make, model) VALUES(?, ?, ?)';
$stmt = mysqli_stmt_init($cnn);
mysqli_stmt_prepare($stmt, $query);

// 4. Bind parameters to prevent SQL injection ('sss' means three string parameters)
@mysqli_stmt_bind_param($stmt, 'sss', $pl, $mk, $md);

// 5. Execute and check for success
mysqli_stmt_execute($stmt);
if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Record Saved.";
}

// 6. Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($cnn);
?>
```

---

## Part 2: The "Read" Operation (Listing Data)

The "Read" operation retrieves data from the database and displays it.

### The PHP Script (`list.php`)

This script fetches all records from the `cars` table and displays them in an HTML table.

#### PDO Example (`327s1/carspdo/list.php`)

```php
<?php
// 1. Connect to the database
$dsn = 'mysql:dbname=autos;host=localhost';
$user = 'caruser';
$password = 'driver';
try {
    $cnn = new PDO($dsn, $user, $password);
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// 2. Prepare and execute the SELECT statement
$sth = $cnn->prepare('SELECT * FROM cars');
$sth->execute();

// 3. Fetch all results into an associative array
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);

// 4. Display the data in a table
if ($sth->rowCount() > 0) {
    echo '<table border="1"><tr><th>Plate</th><th>Make</th><th>Model</th></tr>';
    foreach ($rows as $rec) {
        echo '<tr>';
        echo '<td>' . $rec['plate'] . '</td>';
        echo '<td>' . $rec['make'] . '</td>';
        echo '<td>' . $rec['model'] . '</td>';
        echo '</tr>';
    }
    echo '</table><br/>';
}
echo sizeof($rows) . ' record(s) found';

// 5. Close connection
$cnn = null;
?>
```

#### MySQLi Example (`327s1/carsmysqli/list.php`)

```php
<?php
// 1. Connect to the database
$cnn = @mysqli_connect("localhost", "caruser", "driver", "autos");
if (!$cnn) {
    exit('Connection failed: ' . mysqli_connect_error());
}

// 2. Prepare and execute the SELECT statement
$query = 'SELECT * FROM cars';
$stmt = mysqli_stmt_init($cnn);
mysqli_stmt_prepare($stmt, $query);
mysqli_stmt_execute($stmt);

// 3. Bind result variables
mysqli_stmt_bind_result($stmt, $pl, $mk, $md);

// 4. Display the data in a table
echo '<table border="1"><tr><th>Plate</th><th>Make</th><th>Model</th></tr>';
// 5. Fetch and display each row
while (mysqli_stmt_fetch($stmt)) {
    echo '<tr>';
    echo "<td>$pl</td>";
    echo "<td>$mk</td>";
    echo "<td>$md</td>";
    echo '</tr>';
}
echo '</table><br/>';
echo mysqli_stmt_num_rows($stmt) . ' records found<br/>';

// 6. Close statement and connection
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
mysqli_close($cnn);
?>
```

---

## Part 3: The "Update" Operation (Editing Data)

Updating data is a two-step process:
1.  **Fetch:** Retrieve the existing record from the database.
2.  **Update:** Submit the changes to a script that updates the record.

### Step 1: Search Form (`searchforupdate.html`)

This form asks for the Plate number of the car to edit.

```html
<form name="frm" method="post" action="edit.php">
    Plate: <input type="text" name="pl" maxlength="6" size="8" required=""><br/>
    <br/>
    <input type="submit" value="Edit">
</form>
```

### Step 2: Fetch and Display Script (`edit.php`)

This script gets the Plate number, fetches the corresponding car's data, and displays it in a form, ready for editing.

#### PDO Example (`327s1/carspdo/edit.php`)

```php
<?php
// 1. Get the plate from the search form
$pl = strtoupper(filter_input(INPUT_POST, 'pl'));

// 2. Connect to the database
$dsn = 'mysql:dbname=autos;host=localhost';
$user = 'caruser';
$password = 'driver';
try {
    $cnn = new PDO($dsn, $user, $password);
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// 3. Fetch the record
$sth = $cnn->prepare('SELECT * FROM cars WHERE plate = :pl');
$sth->bindParam(':pl', $pl, PDO::PARAM_STR);
$sth->execute();

// 4. If record exists, display it in a form
if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
?>
<form name="frm" method="post" action="update.php">
    Plate: <input type="text" name="pl" readonly value="<?php echo $row["plate"]; ?>"><br/>
    Make:  <input type="text" name="mk" value="<?php echo $row["make"]; ?>"><br/>
    Model: <input type="text" name="md" value="<?php echo $row["model"]; ?>"><br/>
    <input type="reset"> <input type="submit" value="Update">
</form>
<?php
} else {
    die('No such record in my table');
}
$cnn = null;
?>
```

### Step 3: Update Script (`update.php`)

This script receives the edited data and updates the record in the database.

#### PDO Example (`327s1/carspdo/update.php`)

```php
<?php
// 1. Get updated data from the edit form
$pl = strtoupper(filter_input(INPUT_POST, 'pl'));
$mk = strtoupper(filter_input(INPUT_POST, 'mk'));
$md = strtoupper(filter_input(INPUT_POST, 'md'));

// 2. Connect to the database
// ... (Connection code is the same as above) ...

// 3. Prepare and execute the UPDATE statement
$sth = $cnn->prepare('UPDATE cars SET make = :mk, model = :md WHERE plate = :pl');
$sth->bindParam(':pl', $pl, PDO::PARAM_STR);
$sth->bindParam(':mk', $mk, PDO::PARAM_STR);
$sth->bindParam(':md', $md, PDO::PARAM_STR);
$sth->execute();

if ($sth->rowCount() > 0) {
    echo "Record Updated";
} else {
    echo "No changes were made.";
}

$cnn = null;
?>
```

*(The MySQLi examples for Update follow a similar pattern to the PDO examples and their own `add` and `list` examples shown previously.)*

---

## Part 4: The "Delete" Operation (Removing Data)

This operation removes a record from the database, usually identified by its primary key.

### Step 1: The HTML Form (`delete.html`)

A simple form to get the Plate number of the car to delete.

```html
<form name="frm" method="post" action="delete.php">
    Plate: <input type="text" name="pl" maxlength="6" size="8" required=""><br/>
    <input type="submit" value="Delete">
</form>
```

### Step 2: The PHP Script (`delete.php`)

This script takes the Plate number and executes a `DELETE` query.

#### PDO Example (`327s1/carspdo/delete.php`)

```php
<?php
// 1. Get Plate number from the form
$pl = strtoupper(filter_input(INPUT_POST, 'pl'));
if (strlen(trim($pl)) < 1) {
    exit('Plate can not be blank');
}

// 2. Connect to the database
// ... (Connection code is the same as above) ...

// 3. Prepare and execute the DELETE statement
$sth = $cnn->prepare('DELETE FROM cars WHERE plate = :pl');
$sth->bindParam(':pl', $pl, PDO::PARAM_STR);
$sth->execute();

if ($sth->rowCount() > 0) {
    echo "Record Deleted";
} else {
    echo "There is no such plate recorded.";
}

$cnn = null;
?>
```

#### MySQLi Example (`327s1/carsmysqli/delete.php`)

```php
<?php
// 1. Get Plate number from the form
$pl = strtoupper(filter_input(INPUT_POST, 'pl'));
if (strlen(trim($pl)) < 1) {
    exit('Plate can not be blank');
}

// 2. Connect to the database
$cnn = @mysqli_connect("localhost", "caruser", "driver", "autos");
// ... (Connection error check) ...

// 3. Prepare and execute the DELETE statement
$query = 'DELETE FROM cars WHERE plate = ?';
$stmt = mysqli_stmt_init($cnn);
mysqli_stmt_prepare($stmt, $query);
@mysqli_stmt_bind_param($stmt, 's', $pl);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Record removed.";
}

mysqli_stmt_close($stmt);
mysqli_close($cnn);
?>
```
