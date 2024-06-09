<?php

include_once 'function.php';

if (!empty($_GET["x"])) {
    $x = $_GET['x'];

    switch ($x) {
        case 1:
            echo " <h3>Викликати функцію func1</h3>";
            break;
        case 2:
            echo " <h3>Викликати функцію func2</h3>";
            break;
        case 3:
            echo " <h3>Викликати функцію func3</h3>";
            break;
        case 4:
            echo " <h3>Викликати функцію func4</h3>";
            break;
        case 5:
            echo " <h3>Викликати функцію func5</h3>";
            break;
        case 6:
            echo " <h3>Викликати функцію func6</h3>";
            break;
        default:
            echo " <h3>Некоректні дані</h3>";
            break;

    }

}

$r = rand(1, 6);
echo "<hr><a href='lab3_7.php?x=$r'>lab3_7.php</a>";

?>