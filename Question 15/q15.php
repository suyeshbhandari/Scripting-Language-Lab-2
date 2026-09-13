<?php
function sumOrTriple(int $a, int $b): int {
    $sum = $a + $b;
    return ($a === $b) ? (3 * $sum) : $sum;
}

// Testing the function
echo "Sum of 3 and 2: " . sumOrTriple(3, 2) . "<br>";
echo "Sum of 3 and 3 (same values): " . sumOrTriple(3, 3);
?>