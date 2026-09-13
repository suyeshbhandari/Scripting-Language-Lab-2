<?php
function wrapFirstThreeChars(string $str): string {
    $front = (strlen($str) < 3) ? $str : substr($str, 0, 3);
    return $front . $str . $front;
}

// Testing with sample inputs
$inputs = ["Python", "JS", "Code"];

foreach ($inputs as $input) {
    echo "Input: '$input' => Output: '<strong>" . wrapFirstThreeChars($input) . "</strong>'<br>";
}
?>