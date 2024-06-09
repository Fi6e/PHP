<?php
require("../config.php");
$ln = substr(basename(__DIR__), 3, 1);
$taskN = substr(basename(__FILE__), -5, 1);

$child = array('Носки', 'Боді', "Капелюх", "Сукня");

if (!empty($_GET["choice"]) && !empty($_GET["n"])) {
    $number = $_GET['choice'];
    $n = $_GET["n"];
    echo "<h2>Ви обрали '" . $child[$number - 1] . "'</h2>";
    echo "<img src='images/child_{$number}.png' width='300' height='300'>";

    if ($n == $number) {
        echo "<h2>Маєте рацію!</h2>";
    } else {
        echo "<h2>Ви помилились!</h2>";
    }
} else {
    $rand = array_rand($child) + 1;
    echo "<h3>Оберіть дитячий одяг: " . $child[$rand - 1] . "</h3>";
    for ($i = 1; $i <= 4; $i++) {
        echo "<a href='lab2_4.php?choice=$i&n=$rand'> <img src='images/child_{$i}.png' width='300' height='300'></a>";
    }
}
?>

