<?php
require("../config.php");

$my_topic = array(
    2 => 'Носки',
    3 => 'Боді',
    4 => 'Капелюх',
    5 => 'Сукня'
);

echo "<h3>Елементи масиву з індексами:</h3>";
foreach ($my_topic as $index => $value) {
    echo "$index: $value\n";
}

$my_topic = array_flip($my_topic);

echo "<h3>Елементи масиву після зміни місцями індексів та значень:</h3>";
foreach ($my_topic as $index => $value) {
    echo "<p>[$index]: $value</p> ";
}

?>
