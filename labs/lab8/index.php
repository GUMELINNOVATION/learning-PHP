
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
    
    <form action="index.php" method="post">
        <label for="day">Choose a day:</label>
        <select name="day" id="day" onchange="if(this.value != '0') this.form.submit()">
            <option value="0">--Select a day--</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>
    </form>
</div>
<?php

    $day = $_POST['day'];
    if ($day == "Monday"){
        echo "Monday is the very first day.";
    }
    elseif ($day == "Tuesday"){
        echo "On Tuesday  my friends come to play.";
    }
    elseif ($day == "Wednesday"){
        echo "Wednesday the week is half way through";
    }
    elseif ($day == "Thusday"){
        echo "On thursday I don't feel so blue";
    }
    elseif ($day == "Friday"){
        echo "On friday I get all excited";
    }
    elseif ($day == "Saturday"){
        echo "On Saturday I'm invited to parties";
    }
    else {
        echo "On Sunday I need rest. ";
    }

    
    
?> <br><br>

</body>

</html>