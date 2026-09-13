<?php
// Creating variables with different data types
$stringVar = "Hello, BCA 4th Semester!";
$integerVar = 42;
$floatVar = 98.6;
$boolVar = true;
$arrayVar = ["PHP", "JavaScript", "MySQL", 2026];

echo "<h2>1a. Output using echo and print</h2>";
echo "Using echo: String = $stringVar, Integer = $integerVar <br>";
print "Using print: Float = $floatVar, Boolean = " . ($boolVar ? "True" : "False") . "<br><br>";

echo "<h2>1b. Array Inspection using print_r and var_dump</h2>";
echo "<strong>Using print_r:</strong><pre>";
print_r($arrayVar);
echo "</pre>";

echo "<strong>Using var_dump:</strong><pre>";
var_dump($arrayVar);
echo "</pre><br>";

echo "<h2>1c. Data Type Checking</h2>";
echo "\$stringVar is string: " . (is_string($stringVar) ? 'Yes' : 'No') . "<br>";
echo "\$integerVar type: " . gettype($integerVar) . "<br>";
echo "\$floatVar is float: " . (is_float($floatVar) ? 'Yes' : 'No') . "<br>";
echo "\$arrayVar is array: " . (is_array($arrayVar) ? 'Yes' : 'No') . "<br>";
?>