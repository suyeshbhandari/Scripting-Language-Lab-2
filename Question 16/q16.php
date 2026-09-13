<?php
function absoluteDifference51(int $n): int {
    $diff = abs($n - 51);
    return ($n > 51) ? (3 * $diff) : $diff;
}

// Testing the function
echo "Result for n = 30: " . absoluteDifference51(30) . "<br>";
echo "Result for n = 60: " . absoluteDifference51(60);
?>