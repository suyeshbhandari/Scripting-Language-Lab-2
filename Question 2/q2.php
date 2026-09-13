<?php
define("PI", 3.14159); // Defining constant PI

$radius = 7; // Radius input
$area = PI * pow($radius, 2);

echo "Radius of Circle: " . $radius . " units<br>";
echo "Value of PI: " . PI . "<br>";
echo "<strong>Calculated Area of Circle: " . round($area, 2) . " sq units</strong>";
?>