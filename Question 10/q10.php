<?php
function recursiveStrLen(string $str): int {
    // Base Case: empty string has length 0
    if ($str === '') {
        return 0;
    }
    // Recursive Step: 1 + length of substring excluding first character
    return 1 + recursiveStrLen(substr($str, 1));
}

// Testing the function
$sampleText = "BCA Scripting";
$length = recursiveStrLen($sampleText);

echo "The recursive length of '$sampleText' is: <strong>$length</strong>";
?>