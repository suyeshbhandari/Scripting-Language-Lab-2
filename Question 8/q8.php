<?php
function isSameLength(string $str1, string $str2): bool {
    return strlen($str1) === strlen($str2);
}

// Testing the function
$stringA = "Nepal";
$stringB = "India";
$stringC = "Kathmandu";

echo "Comparing '$stringA' and '$stringB': " . (isSameLength($stringA, $stringB) ? "True (Same Length)" : "False") . "<br>";
echo "Comparing '$stringA' and '$stringC': " . (isSameLength($stringA, $stringC) ? "True" : "False (Different Length)");
?>