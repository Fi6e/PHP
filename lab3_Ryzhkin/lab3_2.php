<?php
require("../config.php");
$a = 19;
$array = [];
 

for ($i = 0; $i < 10; $i++) {
    $array[$i] = mt_rand(1, $a + 10);
    echo "<div> A[" . $i . "] = " . $array[$i] . "</div>";
}

$min = $array[0];
$max = $array[0];
$sum = 0;

for ($i = 0; $i < 10; $i++) {
    if ($array[$i] > $max) {
        $max = $array[$i];
        $indexMax = $i;
    }
    if ($array[$i] < $min) {
        $min = $array[$i];
        $indexMin = $i;
    }
    $sum += $array[$i];
}

$average = $sum / 10;

echo "<div>MIN індекс:  - " . $indexMin . ", значення MIN індексу - " . $min . "</div>";
echo "<div>MAX індекс: - " . $indexMax . ", значення MAX індексу - " . $max . "</div>";
echo "<div>Середнє арифметичне: " . $average . "</div>";

?>
