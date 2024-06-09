<?php
require("../config.php"); 

$firstArray = [];
$secondArray = [];


for ($i = 10; $i <= 20; $i++) {
    $firstArray[] = $i * $i;
}

for ($i = 1; $i <= 10; $i++) {
    $secondArray[] = $i * $i * $i;
}


$combinedArray = array_merge($firstArray, $secondArray);
echo "<br><h2>Масив з квадратами:</h2><br>"; 
print_r($firstArray);
echo "<br><h2>Масив з кубами:</h2><br>";
print_r($secondArray);
echo "<br><h2>Масив комбінований:</h2><br>";
print_r($combinedArray);
?>

