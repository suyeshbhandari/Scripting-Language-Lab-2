<?php
function getValueByIndex(array $arr, $index) {
    if (array_key_exists($index, $arr)) {
        return $arr[$index];
    }
    return "Index out of bounds";
}

// Testing the function
$colors = ["Red", "Green", "Blue", "Yellow"];

echo "Value at index 2: " . getValueByIndex($colors, 2) . "<br>";
echo "Value at index 5: " . getValueByIndex($colors, 5);
?>