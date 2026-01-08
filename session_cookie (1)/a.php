<?php
   //ini_set("display_errors","off");
$n1=$_REQUEST["n1"];
$n2=$_REQUEST["n2"];
$n1=filter_var($n1,FILTER_VALIDATE_INT);
$n2=filter_var($n2,FILTER_VALIDATE_INT);
  //$n2=filter_input(INPUT_GET,"n2",FILTER_VALIDATE_INT);

// divide n1/n2
    try { 
        if ($n2==0) throw new Exception("Hello. Division by zero error",123);
        if ($n2<0) throw new Exception("Divisor could not be less than 0",235);
        echo "$n1/$n2=".($n1/$n2);
    } catch (Exception $e) {
        echo $e->getCode().":".$e->getMessage();
    } finally {
        print "<br/>Finally is executed always";
    }
echo "<br/>The rest";
?>