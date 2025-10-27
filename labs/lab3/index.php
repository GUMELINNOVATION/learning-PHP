<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>lab 3 itec327</title>
</head>
<body class="p-6 space-y-2 bg-blue-100 m-3" >
  <input type= "color" id="head"
  oninput="document.body.style.backgroundColor = this.value"> 
<input
  type="range"
  min="0"
  max="100"
  value="50"
  class="w-full"
  id="myRange"
  oninput="document.body.style.color = `rgb(${this.value * 2.55}, 0, 0)`"
/>
<!-- Q1. 
For this PHP exercise, write a script using the following array:
$a[0] =2;
$a[1] =3;
$a[2] =5;
$a[3] =6;

Write a script that will visit each element of the array $a, and will decide about if the value for current index is an even or an odd integer. And will display an output: (As an example)
 Element 1 is even. 
 Element 2 is odd.
 Element 3 is odd.
 Element 4 is even.

The size of array and value for each array element could vary. Your script must use either foreach loop or a count() function in order  to decide the length of the array.
Hint use % operator to decide if the value is an even or an integer. -->

<?php
echo "<h1 class=\"text-2xl font-bold mt-2 border-2\">Lab 3 - question1</h1>";
echo "<h1 class=\"text-xl\">Even and Odd Elements</h1>";
$a[0] =2;
$a[1] =3;
$a[2] =5;
$a[3] =6;

foreach ($a as $index => $value) {
    if ($value % 2 == 0) {
        echo "Element " . ($index + 1) . " is even.<br>";
    } else {
        echo "Element " . ($index + 1) . " is odd.<br>";
    }
}

?>

<!-- Q2.  
For this PHP exercise, write a script using the following array:
$w[0] ='r';
$w[1] ='o';
$w[2] ='t';
$w[3] ='a';
$w[4] ='t';
$w[5] ='o';
$w[6] ='r';
$w[7] ='s';

Write a script that will visit each element of the array $w and concatenate the elements 
of the array to form two words both backward and forward. And then displays them in 
seperated lines.

The size of array and value for each array element could vary.
 Your script must use either foreach loop or a count() function in order 
  to decide the length of the array. -->

<?php
echo "<h1 class=\"text-2xl font-bold mt-2 border-2\">Lab 3 - question2</h1>";
echo "<h1 class=\"text-xl\">Concatenate Elements Forward and Backward</h1>";
$w[0] ='r';
$w[1] ='o';
$w[2] ='t';
$w[3] ='a';
$w[4] ='t';
$w[5] ='o';
$w[6] ='r';
$w[7] ='s';

foreach ($w as $value) {
    echo $value ;

}
echo "<br>";

$index = count($w);
for ($i = $index - 1; $i >= 0; $i--) {
    echo $w[$i] ;
}


?>


<!-- Q3. Write a script that uses the following associative array.
  Your script should sort the array based on their keys(index) in
   reverse and display each item in a seperate line as the output.
    Your script should work for any key and any value of the array 
    “q”. (if I add 6th element as q[“z”]=0; your script without any
     need to an update should work and display the correct answer.)

	        q[“a”]=5;
            q[“b”]=4;
            q[“c”]=3;
            q[“d”]=2;
            q[“e”]=1; -->
<?php
echo "<h1 class=\"text-2xl font-bold mt-2 border-2\">Lab 3 - question3</h1>";
echo "<h1 class=\"text-xl\">Sort Associative Array by Keys in Reverse</h1>";
$q = array(
    "a" => 5,
    "b" => 4,
    "c" => 3,
    "d" => 2,
    "e" => 1,
    "z" => 0

);
sort($q);
foreach ($q as $key => $value) {
    echo "Key: $key, Value: $value<br>";
}
?>

<!-- Q4. Write a script that uses the following array and the variable. 
$w[0] ='r';
$w[1] ='o';
$w[2] ='t';
$w[3] ='a';
$w[4] ='t';
$w[5] ='o';
$w[6] ='r';
$w[7] ='s';

$s='r';
Your script should search the character($s) and display 
the key(index) of that character($s).
i.	with array_search predefined function
ii.	with using foreach loop.
Note that when the values of $s & $w changes your script should continue to work. -->
<?php
echo "<h1 class=\"text-2xl font-bold mt-2 border-2\">Lab 3 - question4</h1>";
echo "<h1 class=\"text-xl\">Search Character in Array</h1>";
$w[0] ='r';
$w[1] ='o';
$w[2] ='t';
$w[3] ='a';
$w[4] ='t';
$w[5] ='o';
$w[6] ='r';
$w[7] ='s';

$s='o';
echo "Using array_search:<br>";
$index = array_search($s, $w);
if ($index !== false) {
    echo "Character '$s' found at index: $index<br>";
} else {
    echo "Character '$s' not found.<br>";
}

echo "Using foreach loop:<br>";
foreach ($w as $key => $value) {
    if ($value === $s) {
        echo "Character '$s' found at index: $key<br>";
        break;
    }
}

?>

<?php
echo "<h1 class=\"text-2xl font-bold mt-2 border-2\">Lab 3 - question5</h1>";
echo "<h1 class=\"text-xl\">Maximum and Minimum Values in an Array</h1>";
$a[0] =2;
$a[1] =7;
$a[2] =1;
$a[3] =6;

foreach ($a as $value) {
    $max = max($a);
    $min = min($a);
}

echo "Maximum value: $max<br>";
echo "Minimum value: $min<br>";

?>

<?php
echo "<h1 class=\"text-2xl font-bold mt-2 border-2\">Lab 3 - question5</h1>";
echo "<h1 class=\"text-xl\">Maximum and Minimum Values in an Array</h1>";
$a[0] =2;
$a[1] =7;
$a[2] =1;
$a[3] =6;

foreach ($a as $value) {
    $max = max($a);
    $min = min($a);
}

echo "Maximum value: $max<br>";
echo "Minimum value: $min<br>";

?>
<!-- Q6. Write a script that uses the following array. 
$w[0] ='r';
$w[1] ='o';
$w[2] ='t';
$w[3] ='a';
$w[4] ='t';
$w[5] ='o';
$w[6] ='r';
$w[7] ='s';

Your script should display the values that occurred more than once. -->

<?php
echo "<h1 class=\"text-2xl font-bold mt-3 border-2\">Lab 3 - question6</h1>";
echo "<h1 class=\"text-xl\">Values Occurring More Than Once in an Array</h1>";
$w[0] ='r';
$w[1] ='o';
$w[2] ='t';
$w[3] ='a';
$w[4] ='t';
$w[5] ='r';
$w[6] ='r';
$w[7] ='s';

$valueCounts = count($w);
$duplicates = [];

echo $valueCounts;

for ($i = 0; $i < $valueCounts; $i++) {
    $count = 0;
    for ($j = 0; $j < $valueCounts; $j++) {
       if ($w[$i] == $w[$j]) {
           $count++;
       }
    }
    if ($count > 1 && !($duplicates[$w[$i]] ?? false)) {
    $duplicates[$w[$i]] = $count;
}

}

echo "Values occurring more than once:<br>";
foreach ($duplicates as $value => $count) {
    echo "Value: $value, Count: $count<br>";
}
?>
