<?php
require("../config.php");
$x = 4;
$y = 5;

function calculateResult($x, $y, &$variant) {
    if ($x > 0 && $y != 0) {
        $variant = 1;
        return (2 * $x / $y) + ($x * pow($y, 2));
    } elseif (($x != 0) && (2 * $x + $y) / 2 != 0) {
        $variant = 2;
        return $y / (2 * $x);
    } else {
        $variant = 3;
        return pow($x, 2);
    }
}


if (!empty($_POST["y"]) && !empty($_POST["x"])) {
    $x = $_POST['x'];
    $y = $_POST["y"];

    if (is_numeric($x) && is_numeric($y)) {
        $variant = null;
        $result = calculateResult($x, $y, $variant);

        echo "<h4> x = $x</h4><h4> y = $y</h4>";
        
        if ($variant == 1) {
            echo "<h3> Варіант 1: (2 * x / y) + (x * y^2)</h3>";
        } elseif ($variant == 2) {
            echo "<h3> Варіант 2: y / (2 * x)</h3>";
        } elseif ($variant == 3) {
            echo "<h3> Варіант 3: x^2</h3>";
        }

        echo "<h3> result = $result</h3>";
    } else {
        echo "<h3>Введіть числові значення для x та y!</h3>";
    }
}

echo "<p>Варіант 19</p>
<div>
    Введіть два числа, щоб обчислити:
    <form action='lab2_3.php' method='post'>
        введіть x :<br>
        <input type='text' value='$x' name='x'><br>
        введіть число y :<br>
        <input type='text' value='$y' name='y'><br>
        <input type='submit' value='Обчислити'>
    </form>
</div>
";
?>
