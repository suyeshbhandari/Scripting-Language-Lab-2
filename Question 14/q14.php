<?php
function carsNeeded(int $n): int {
    // Each car accommodates 4 passengers (1 driver + 4 passengers = 5 total)
    return (int) ceil($n / 4);
}

// Testing the function
$people = 11;
echo "Number of cars needed for $people people: " . carsNeeded($people) . " car(s)";
?>