<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-blue-200 min-h-screen flex items-center justify-center">
    <div class=" flex flex-col p-20 space-y-10 border-4 border-dashed border-blue-500 justify-content-center"> 
    <div class="text-lg bg-white p-6 rounded-lg shadow-md">
       
        <h1 class="text-3xl font-bold font-mono my-6">Question 1</h1>
        <?php
            class FirstCls {
                public function greet() {
                    return "Hello";
                }
            }
            $firstClass = new FirstCls;
            echo $firstClass->greet();
        ?>
    </div>

    <div class="text-lg bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold font-mono my-6">Question 2</h1>

        <form method="POST">
            <input class="border border-blue-500 p-2 rounded" type="number" name="num1" placeholder="Enter first number" required>
            <input class="border border-blue-500 p-2 rounded" type="number" name="num2" placeholder="Enter second number" required>
            <button class="bg-blue-500 text-white p-2 rounded" type="submit" name="q2">Submit</button>
        </form>

        <?php

        class Operations {
            private $num1;
            private $num2;

            public function __construct($n1, $n2) {
                $this->num1 = $n1;
                $this->num2 = $n2;
            }

            public function add() { return $this->num1 + $this->num2; }
            public function subtract() { return $this->num1 - $this->num2; }
            public function multiply() { return $this->num1 * $this->num2; }

            public function divide() {
                return $this->num2 == 0 ? "Division by zero error" : $this->num1 / $this->num2;
            }
        }

        if (isset($_POST['q2'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];

            $operations = new Operations($num1, $num2);

            echo "<br><strong>Results:</strong><br>";
            echo "Addition: " . $operations->add() . "<br>";
            echo "Subtraction: " . $operations->subtract() . "<br>";
            echo "Multiplication: " . $operations->multiply() . "<br>";
            echo "Division: " . $operations->divide() . "<br>";
        }
        ?>
    </div>

<div class="text-lg bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold font-mono my-6">Question 3</h1>

        <form method="POST">
            <input class="border border-blue-500 p-2 rounded" type="date" name="date1" required>
            <input class="border border-blue-500 p-2 rounded" type="date" name="date2" required>
            <button class="bg-blue-500 text-white p-2 rounded" type="submit" name="submit">Submit</button>
        </form>

        <?php
            class Differ { 
                private $date1;
                private $date2;

                public function __construct($d1, $d2) {
                    $this->date1 = $d1;
                    $this->date2 = $d2;
                }

                public function thediff() {
                    $sdate = new DateTime($this->date1);
                    $edate = new DateTime($this->date2);
                    $interval = $sdate->diff($edate);

                    echo "Difference: {$interval->y} years, {$interval->m} months, {$interval->d} days";
                }
            }

            if (isset($_POST['submit'])) {
                $d1 = $_POST['date1'];
                $d2 = $_POST['date2'];

                $differ = new Differ($d1, $d2);
                $differ->thediff();
            }
        ?>
    </div>
    </div>

</body>
</html>
