<?php
function getTriangleArea($base, $height) {
    return 0.5 * $base * $height;
}

// Testing the function
$base = 10;
$height = 12;
$area = getTriangleArea($base, $height);

echo "Base: $base, Height: $height <br>";
echo "<strong>Area of Triangle: $area sq units</strong>";
?>