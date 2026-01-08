# PHP Exam Cheat Sheet

This cheat sheet summarizes the key concepts found in the project files, focusing on PHP, database interaction (MySQLi and PDO), SQL, and object-oriented programming.

## 1. PHP Basics

### Superglobals for Form Handling
- `$_POST`: An associative array of variables passed to the current script via the HTTP POST method.
- `$_GET`: An associative array of variables passed to the current script via the URL parameters.
- `filter_input()`: Retrieves a specific external variable by name and optionally filters it. It's a more secure way to access `$_POST` and `$_GET` data.

**Example from `327s1/carspdo/add.php`:**
```php
$pl = strtoupper(filter_input(INPUT_POST, 'pl'));
$mk = strtoupper(filter_input(INPUT_POST, 'mk'));
$md = strtoupper(filter_input(INPUT_POST, 'md'));
```

## 2. HTML Forms

Forms are used to collect user input. The `action` attribute specifies where to send the form-data when a form is submitted, and the `method` attribute specifies the HTTP method to use.

**Example from `sample/add.html`:**
```html
<form name="frm" method="post" action="add.php">
    Plate: <input type="text" name="pl" maxlength="6" size="8"><br/>
    Make:  <input type="text" name="mk" maxlength="20" size="24"><br/>
    Model: <input type="text" name="md" maxlength="10" size="12"><br/>
    <input type="submit" value="Save">
</form>
```

## 3. SQL Commands

Based on `327s1/qrys.sql` and other files.

- **`CREATE TABLE`**: Defines a new table.
  ```sql
  CREATE TABLE IF NOT EXISTS `cars` (
    `plate` char(6) NOT NULL,
    `make` varchar(20) NOT NULL,
    `model` varchar(10) NOT NULL,
    PRIMARY KEY (`plate`)
  );
  ```
- **`INSERT INTO`**: Adds new rows to a table.
  ```sql
  INSERT INTO `cars` (`plate`, `make`, `model`) VALUES ('U782', 'TOFAS', 'HACI MURAT');
  ```
- **`DELETE FROM`**: Deletes rows from a table.
  ```sql
  DELETE FROM cars WHERE plate='...';
  ```
- **`SELECT ... FROM`**: Retrieves data from a table.
  ```sql
  SELECT * FROM cars;
  ```

## 4. Database with MySQLi

### Object-Oriented Style

**Connecting to MySQL:**
```php
@$cnn = new mysqli('localhost', 'caruser', 'driver', 'autos');
if ($cnn->connect_error) {
    exit('Connect Error (' . $cnn->connect_errno . ') '. $cnn->connect_error);
}
```

**Prepared Statement (INSERT):**
*From `327s1/carsmysqliWObjects/add.php`*
```php
$query = 'INSERT INTO cars(plate,make,model) VALUES(?,?,?)';
$stmt = $cnn->stmt_init();
$stmt->prepare($query);
@$stmt->bind_param('sss', $pl, $mk, $md);
$stmt->execute();
```

**Prepared Statement (SELECT):**
*From `327s1/carsmysqliWObjects/list.php`*
```php
$query = 'SELECT * FROM cars';
$stmt = $cnn->stmt_init();
$stmt->prepare($query);
$stmt->execute();
@$stmt->bind_result($pl, $mk, $md);

while ($stmt->fetch()) {
    echo "<td>$pl</td><td>$mk</td><td>$md</td>";
}
$stmt->close();
$cnn->close();
```

### Procedural Style

**Connecting to MySQL:**
```php
$cnn = @mysqli_connect("localhost", "caruser", "driver", "autos");
if (!$cnn) {
    exit('Connection failed: ' . mysqli_connect_error());
}
```

**Prepared Statement (INSERT):**
*From `327s1/carsmysqli/add.php`*
```php
$query = 'INSERT INTO cars(plate,make,model) VALUES(?,?,?)';
$stmt = mysqli_stmt_init($cnn);
mysqli_stmt_prepare($stmt, $query);
mysqli_stmt_bind_param($stmt, 'sss', $pl, $mk, $md);
mysqli_stmt_execute($stmt);
```

## 5. Database with PDO

**Connecting to MySQL:**
```php
$dsn = 'mysql:dbname=autos;host=localhost';
$user = 'caruser';
$password = 'driver';

try {
    $cnn = new PDO($dsn, $user, $password);
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
```

**Prepared Statement (INSERT):**
*From `327s1/carspdo/add.php`*
```php
$sth = $cnn->prepare('INSERT INTO cars(plate,make,model) VALUES(:pl,:mk,:md)');
$sth->bindParam(':pl', $pl, PDO::PARAM_STR, 6);
$sth->bindParam(':mk', $mk, PDO::PARAM_STR, 20);
$sth->bindParam(':md', $md, PDO::PARAM_STR, 10);
$sth->execute();
```

**Prepared Statement (SELECT):**
*From `327s1/carspdo/list.php`*
```php
$sth = $cnn->prepare('SELECT * FROM cars');
$sth->execute();
$rows = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $rec) {
    echo '<tr>';
    echo '<td>'.$rec['plate'].'</td>';
    echo '<td>'.$rec['make'].'</td>';
    echo '<td>'.$rec['model'].'</td>';
    echo '</tr>';
}
```

## 6. PHP Object-Oriented Programming (OOP)

Based on `labs/lab7/question 4/`.

**Class Definition:**
A class is a template for objects.
```php
class Shape {
    // Properties (variables)
    public $name;
    protected $length;
    protected $width;
    private $id;

    // Constant
    const SHAPE_TYPE = 1;

    // Constructor (called when an object is created)
    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
        $this->id = uniqid();
    }

    // Methods (functions)
    public function area() {
        return $this->length * $this->width;
    }

    public static function getTypeDescription() {
        return "Type: " . self::SHAPE_TYPE;
    }
}
```

**Inheritance:**
A class can inherit the properties and methods of another class.
```php
require_once "Shape.php";

class Circle extends Shape {
    const SHAPE_TYPE = 3;
    protected float $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
        // Call parent constructor
        parent::__construct($radius, $radius);
    }

    // Override parent method
    public function area(): float {
        return pi() * pow($this->radius, 2);
    }
}
```

**Creating and Using Objects:**
```php
$r = new Rectangle(10, 5); // Creates a new Rectangle object
$r->setName("My Rectangle");
echo $r->area(); // Calls the area method
```

## 7. Session Management

Sessions are a way to store information (in variables) to be used across multiple pages. Unlike cookies, session variables are stored on the server.

**Key Functions:**
- `session_start()`: Starts a new or resumes an existing session. Must be called before any output is sent to the browser.
- `$_SESSION`: An associative array containing session variables.
- `session_destroy()`: Destroys all data registered to a session.

**Conceptual Login Flow:**
1.  User submits a login form.
2.  Server validates credentials against the database.
3.  If valid, store user information in `$_SESSION`.
    ```php
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header('Location: menu.php'); // Redirect to a protected page
    ```
4.  On protected pages, check if the user is logged in.
    ```php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login.php');
        exit;
    }
    ```
