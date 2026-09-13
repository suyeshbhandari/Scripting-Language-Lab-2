<?php
function wrapLastChar(string $str): string {
    if (strlen($str) < 1) {
        return $str;
    }
    $lastChar = substr($str, -1);
    return $lastChar . $str . $lastChar;
}

// Testing with sample inputs
$inputs = ["Red", "Green", "1"];

foreach ($inputs as $input) {
    echo "Input: '$input' => Output: '<strong>" . wrapLastChar($input) . "</strong>'<br>";
}
?>