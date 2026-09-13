<?php
function upperLastThree(string $str): string {
    $len = strlen($str);
    if ($len <= 3) {
        return strtoupper($str);
    }
    return substr($str, 0, $len - 3) . strtoupper(substr($str, -3));
}

// Testing with sample inputs
$inputs = ["Nepal", "Npl", "Bca", "Bachelor"];
foreach ($inputs as $input) {
    echo "Input: '$input' => Output: <strong>" . upperLastThree($input) . "</strong><br>";
}
?>