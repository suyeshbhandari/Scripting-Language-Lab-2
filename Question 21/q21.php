<?php
function findLargest(int $a, int $b, int $c): int {
    return max($a, $b, $c);
}

// Testing with sample inputs
$a = 45; $b = 89; $c = 32;
echo "Among $a, $b, $c, the largest number is: <strong>" . findLargest($a, $b, $c) . "</strong>";
?>