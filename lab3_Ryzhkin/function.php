<?php
function create_table2($data, $border = 1, $cellpadding = 4, $cellspacing = 4)
{
    echo "<h4> Результат виклику функції create_table2: </h4> border=$border";
    echo "<table border=$border  cellpadding=$cellpadding cellspacing=$cellspacing>\n";
    reset($data);
    $value = current($data);
    while ($value) {
        echo "<tr><td>$value</td></tr>\n";
        $value = next($data);
    }
    echo '</table>';
    echo "<div>Кількість параметрів:" . func_num_args() . "<br />";
    $args = func_get_args();
    foreach ($args as $arg)
        echo $arg . "<br/>";
    echo "</div>";
}

function print_array($array)
{
    foreach ($array as $key => $value) {
        echo "[$key] => $value\n";
    }
    $reversedArray = array_reverse($array, true);
    foreach ($reversedArray as $key => $value) {
        echo "[$key] => $value\n";
    }
}


function print_array_as_table($array)
{
    $minValues = [];

    echo "<table border='1'>";

    foreach ($array as $rowIndex => $row) {
        echo "<tr>";

        $minValue = PHP_INT_MAX;

        foreach ($row as $columnIndex => $value) {
            echo "<td>$value</td>";

            if ($value < $minValue) {
                $minValue = $value;
            }
        }

        $minValues[] = $minValue;

        echo "</tr>";
    }

    echo "</table>";

    echo "<h2>Мінімальні елементи рядків вхідного масиву: </h2> ";
    print_r($minValues);

    echo "<h2>Елементи останнього стовпця:</h2> ";
    print_r(end($array));
}

function lab3_6($N)
{
    $array = [];

    for ($i = 1; $i <= $N; $i++) {
        $array[$i] = $i * $i;
    }

    foreach ($array as $index => $value) {
        echo "[$index] => $value<br>";
    }
}

?>
