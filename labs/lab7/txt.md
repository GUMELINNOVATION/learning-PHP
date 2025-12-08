Labwork 6

Q1. Write a PHP class named “FirstCls” which displays “Hello” when you create an instance.

================================

================================

Q2. Write a PHP class named “Operations” which accepts two arguments during creation of instance (constructor) and able to return the addition, subtraction, multiplication and division via methods.

================================

================================

Q3. Write a PHP class named “Differ” which accepts two arguments as date and via method named “thediff” displays the difference via echo in years, months and days.
Ps. Check DateTime::diff from php.net and the sample below.

<?php
 $sdate = new DateTime("1981-11-03");
$edate = new DateTime("2013-09-04");
$interval = $sdate->diff($edate);
echo "Difference : " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
?>

================================

================================

Q4. From Github:
For this PHP code exercise we will explore Object Oriented Programming in PHP by creating Shape classes:
Shape.php, Rectangle.php, and Circle.php.
Shape.php is the base class. Shape class requirements are:
• A class constant named SHAPE_TYPE with a value of 1.
• Four properties with different visibilities: a public name, a protected length and width, and a private id.
• A constuctor which accepts a length and width parameter to initialize the respective properties.
• The constructor shoudl also initialize the id property to a unique id. (hint: use PHP's uniqid())
• Getter and Setter methods for the name property.
• A Getter method for the id property.
• A public area method which calculates and returns the area of the Shape object.
• A public static getTypeDescription method which returns the string Type: with the SHAPE_TYPE concatenated to
the end.
• A public getFullDescription method which returns the string: Shape<#id>: name - length x width with variables
id, name, length, and width substituted the objects values.
Rectangle.php should inherit from the Shape class. Rectangle class requirements are:
• A class constant named SHAPE_TYPE with a value of 2.
Note: if you used inheritance properly, the Rectangle class should not require any properties or methods.
Circle.php should inherit from the Shape class. Circle class requirements are:
• A class constant named SHAPE_TYPE with a value of 3.
• A protected radius property.
• A constuctor which accepts a radius parameter and initializes the radius property. \*\*Don't forget to call
the Shape class constructor.
• A public area method which calculates and returns the area of the Circle object.
• A public getFullDescription method which returns the string: Circle<#id>: name - radius with variables id, name,
and radius substituted the objects values.
