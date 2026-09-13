<?php
function repeatFrontTwo(string $str): string {
    if (strlen($str) < 2) {
        return $str;
    }
    $frontTwo = substr($str, 0, 2);
    return str_repeat($frontTwo, 4);
}

// Testing with sample inputs
$inputs = ["C Sharp", "JS", "a"];

foreach ($inputs as $input) {
    echo "Input: '$input' => Output: '<strong>" . repeatFrontTwo($input) . "</strong>'<br>";
}
?>