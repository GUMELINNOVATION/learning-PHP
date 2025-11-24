<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div>
    <h1>Question 1</h1>
   
     <?php
     
        echo checkVotingEligibility(2004);
        function checkVotingEligibility($birthYear) {
            $currentYear = date("Y");
            $age = $currentYear - $birthYear;
            
            if ($age >= 18) {
                return "eligible";
            } else {
                return "not eligible";
            }
        }
        ?>
</div>
<div>
    <h1>Question 2</h1>

    <form method="POST">
        <input type="number" name="unit" placeholder="Enter unit">
        <button type="submit" name="q2">Submit</button>
    </form>

    <?php
    if (isset($_POST['q2']) && !empty($_POST['unit'])) {

        function bill($u){
            $total = 0;

            if ($u > 250){
                $total += ($u - 250) * 6.5;
                $u = 250;
            }
            if ($u > 150){
                $total += ($u - 150) * 5.2;
                $u = 150;
            }
            if ($u > 50){
                $total += ($u - 50) * 4.0;
                $u = 50;
            }

            $total += $u * 3.5;

            return $total;
        }

        $unit = $_POST['unit'];
        $totalBill = bill($unit);

        echo "<p>Your bill is <b>$totalBill TL</b></p>";
    }
    ?>
</div>


<div>
    <h1>Question 3</h1>

    <form method="POST">
        <input type="text" name="grade" placeholder="Enter student grades, e.g. 50,70,90">
        <button type="submit" name="q3">Submit</button>
    </form>

    <?php
    if (isset($_POST['q3']) && !empty($_POST['grade'])) {

        $grade = $_POST['grade'];
        $std = explode(",", $grade);

        function above($std) {
            $avg = array_sum($std) / count($std);
            $ab = [];

            foreach ($std as $v) {
                if ($v >= $avg) {
                    $ab[] = $v;
                }
            }
            return [$avg, $ab];
        }

        list($avg, $result) = above($std);

        echo "<p>Average: <b>$avg</b></p>";
        echo "<p>Grades above or equal to average: <b>" . implode(", ", $result) . "</b></p>";
    }
    ?>
</div>


</body>
</html>