<?php
function calculateShapeArea(float $base, float $height, string $shape): float {
    $shape = strtolower($shape);
    if ($shape === "triangle") {
        return 0.5 * $base * $height;
    } elseif ($shape === "parallelogram") {
        return $base * $height;
    }
    return 0.0;
}

// Testing the function
echo "Triangle Area (b=10, h=5): " . calculateShapeArea(10, 5, "triangle") . "<br>";
echo "Parallelogram Area (b=10, h=5): " . calculateShapeArea(10, 5, "parallelogram");
?>