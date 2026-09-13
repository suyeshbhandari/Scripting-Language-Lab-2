<?php
function ageInDays(int $years): int {
    return $years * 365; // Assuming standard years
}

// Testing the function
$ageYears = 20;
$totalDays = ageInDays($ageYears);

echo "Age: $ageYears years = <strong>$totalDays days</strong> (approx).";
?>