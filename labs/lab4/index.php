<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LAB 4</title>
	 <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="p-6 space-y-2 bg-blue-100 m-3" >

<h1 class="text-2xl font-bold my-5">Lab 4 - question 1</h1>
  <form  method="POST">
    <input  class="my-4 w-50 h-10 border-1 rounded fontsize-16" type="number" name="numInput" value="1" min="0" max="20" />
    <input class="my-1 w-30 h-10 border-1 rounded bg-blue-600" type="submit" value="Calculate">
  </form>
  
<?php

use Dom\Document;


function factorial($n) {
    if ($n == 0) {
        return 1;
    }
    return $n * factorial($n - 1);
}

$value = isset($_POST['numInput']) ? $_POST['numInput'] : 1;
echo "Factorial of  $value  is " . factorial($value) . "<br>";

echo "<h2>Recursive Factorial</h2>";
function recursiveFactorial($n) {
	if ($n <= 1) {
		return 1;
	} else {
		return $n * recursiveFactorial($n - 1);
	}
}
echo "Factorial of $value using recursion is " . recursiveFactorial($value) . "<br>";

?>
<!-- 
=====================================


===================================== -->

<h1 class="text-2xl font-bold my-5">QUESTION 2</h1>

 <form  method="POST">
    <input  class="my-4 w-60 h-10 border-1 rounded fontsize-16 P-3" type="number" name="sumeven" value="1" min="0" max="20" />
    <input class="my-1  w-30 h-10 border-1 rounded bg-blue-600" type="submit" value="Calculate">
  </form>

<?php

    function sumEvens($n) {
		$sum = 0;
      if ($n < 2) {
		return 0;
	  } else {
		return $n % 2 == 0 ? $n + sumEvens($n - 2) : sumEvens($n - 1);
	}
		
	}
    

	$value = isset($_POST['sumeven']) ? $_POST['sumeven'] : 1;

	echo "Sum of even numbers up to $value is " . sumEvens($value) . "<br>";

?>

<!-- 
=====================================
=====================================
-->

<h1 class="text-2xl font-bold my-5">Question 3</h1>
 <form  method="POST">
    <input  class="my-3 w-60 h-10 border-1 rounded fontsize-16" type="text" name="occurs" value="occurs" min="0" max="20" />
    <input class="m-1 w-60 h-10 border-1 rounded bg-blue-600" type="submit" value="Check">
  </form>
  
<?php
 function countCharacters($str) {
		$chars = str_split($str); 
	$count = array_count_values($chars); 

	foreach ($count as $char => $occurrences) { 
		echo "'$char' occurs $occurrences times.<br>"; 
}
 }

$str = isset($_POST['occurs']) ? $_POST['occurs'] : "HELLO";

countCharacters($str); ?>
<!-- 
=====================================
=====================================
-->
<h1 class="text-2xl font-bold my-5">Question 4</h1>

 <form  method="POST">
    <input  class="my-3 w-60 h-10 border-1 rounded fontsize-16" type="text" name="string" value="HELLO" min="0" max="20" />
    <input class="m-1 w-60 h-10 border-1 rounded bg-blue-600" type="submit" value="Check">
  </form>
<?php

function isuppercase($str){
	if ($str === strtoupper($str)){
		return "true";
	} else {
		return "false";
	}
}
$testStr = isset($_POST['string']) ? $_POST['string'] : "HELLO";
echo isuppercase($testStr);

?>
</body>
</html>


