<?php
function findStringIndex(array $arr, string $target) {
    $index = array_search($target, $arr, true);
    return ($index !== false) ? $index : -1;
}

// Testing the function
$fruits = ["Apple", "Banana", "Mango", "Orange"];
$target = "Mango";

echo "Index of '$target': " . findStringIndex($fruits, $target);
?>