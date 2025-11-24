<?php
function calculateBill($units) {
    if ($units <= 50)
        return $units * 3.5;
    elseif ($units <= 150)
        return (50 * 3.5) + ($units - 50) * 4;
    elseif ($units <= 250)
        return (50 * 3.5) + (100 * 4) + ($units - 150) * 5.2;
    else
        return (50 * 3.5) + (100 * 4) + (100 * 5.2) + ($units - 250) * 6.5;
}


function bill($u){
  $total=0;
  if ($u>250){
    $total+=($u-250)*6.5;
    $u=250;
  }
  if ($u>150){
    $total+=($u-150)*5.2;
    $u=150;
  }
  if ($u>50){
    $total+=($u-50)*4.0;
    $u=50;
  }
    $total+=$u*3.5;
  return $total;
}

echo "Total Bill: TL " . calculateBill(25) . "</br>";
echo bill(25);
?>
