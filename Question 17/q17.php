<?php
function addIf(string $str): string {
    if (strpos(trim($str), 'if') === 0) {
        return $str;
    }
    return "if " . $str;
}

// Testing the function with sample inputs
$inputs = ["if else", "else", "if"];

foreach ($inputs as $input) {
    echo "Input: '$input' => Output: '<strong>" . addIf($input) . "</strong>'<br>";
}
?>