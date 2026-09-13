<?php
function isDivisibleByFive(int $number): bool {
    return $number % 5 === 0;
}

// Testing the function
$test1 = 25;
$test2 = 18;

echo "$test1 is divisible by 5: " . (isDivisibleByFive($test1) ? "True" : "False") . "<br>";
echo "$test2 is divisible by 5: " . (isDivisibleByFive($test2) ? "True" : "False");
?>