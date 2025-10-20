<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="p-10 m-10 bg-sky-200 text-xl">
    <h1 class="text-3xl text-blue-500 font-bold underline">LAB 1 </h1>
<!-- Q1.
Print the following statement to the browser:
"Hello, home home sweet home."
Next, create two variables, one for the word “Hello” and one for the word “home”. Print the statement to the browser again but this time substitute the relevant words with your variables. Remember to include the <br/> tag to show your statements on different lines. -->
<?php
echo "<h1 class=\"text-2xl py-4 font-bold\">Question 1</h1>";
echo "Hello, home home sweet home.";
echo "<br/>";
$greeting = "Hello";
$location = "home";
echo "$greeting, $location $location sweet $location.";
?>

<!-- Q2. 
In your script, create the following variables:
 $a=8;
 $b=6;
 $c=5;
Write a php script to print out the following:
Delta= -124 where the solution calculated using  62-4*8*5 
Formula: b2-4*a*c
When the values of variables change your output should change accordingly.  -->

<?php

echo "<h1 class=\"text-2xl py-4 font-bold\">Question 2</h1>";
$a = 8;
$b = 6;
$c = 5;

$delta = ($b * $b) - 4 * $a * $c;
echo "Delta= $delta where the solution calculated using 62-4*8*5";
?>

<!-- Q3.
For this PHP exercise, write a script using the following variables:
$a="Around";
$d=80;
Using single quotes (' '), the concatenation operator, the variables created, and a single echo statement, echo the following to the browser. When the values of variables change your output should change accordingly. 
Around The World in 80 Days. -->

<?php
echo "<h1 class=\"text-2xl py-4 font-bold\">Question 3</h1>";
$a = "Around";
$d = 80;
echo ''. $a . ' The World in ' . $d . ' Days.';
echo "<br/>";

?>

<!-- Q4.

Find and correct the errors for the PHP script below.

 $color="red";
echo "My car is $Color <br/>";
echo "My car is $color <br/>";
echo "My car is $coLor <br/>"; -->

 <?php
echo "<h1 class=\"text-2xl py-4 font-bold\">Question 4</h1>";
 $color="red";
echo "My car is $color <br/>";
echo "My car is $color <br/>";
echo "My car is $color <br/>";
?>

<!-- Q5.
Try the following PHP script.

-->

<?php
echo "<h1 class=\"text-2xl py-4 font-bold\">Question 5</h1>";
?>
<a href="Q2.php">Q5</a>

</body>
</html>

