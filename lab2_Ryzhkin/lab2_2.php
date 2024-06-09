<?php
require("../config.php");

$x = 4;
$y = 2;  


function calculateF($x, $y): float
{
    return pow($x, 3) + pow($x, 2) + $x + ($x * pow($y, 2));
}

if (!empty($_POST["x"]) && !empty($_POST["y"])) {
    $x = $_POST["x"];
    $y = $_POST["y"];

    if (is_numeric($x) && is_numeric($y)) {
        echo "<h3>Результат: F = " . calculateF($x, $y) . "</h3>";
    } else {
        echo "<h3>Введіть коректні значення для x та y!</h3>";
    }
}

echo "<p>Варіант 19</p>
<div>
    Введіть значення для обчислення F = x^3 + x^2 + x + (x * y^2):<br>
    <form action='lab2_2.php' method='post'>

        Введіть x :<br>
        <input type='text' value='$x' name='x'><br>

        Введіть y :<br>
        <input type='text' value='$y' name='y'><br>

        <input type='submit' value='Обчислити'>
    </form>
</div>
";
?>
