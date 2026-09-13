<?php
function convertMinutesToSeconds(int $minutes): int {
    return $minutes * 60;
}

// Testing the function
$minutes = 5;
$seconds = convertMinutesToSeconds($minutes);

echo "$minutes minutes is equal to <strong>$seconds seconds</strong>.";
?>