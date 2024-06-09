<?php
require("../config.php");
if (!empty($_POST["t1"]) && !empty($_POST["t2"])) {
    $number = $_POST['choice'];
    $t1 = $_POST["t1"];
    $t2 = $_POST["t2"];

    echo " <h3> $t1 - $t2 = " . ($t1 - $t2) . "  </h3>";
    echo " <h3> $t1 * $t2 = " . ($t1 * $t2) . "  </h3>";
    echo " <h3> $t1 / $t2 = " . ($t1 / $t2) . "  </h3>";

}

echo "
<div>
    Введіть два числа:<br>
    <form action='lab2_1.php' method='post'>

        введіть число 1 :<br>
        <input type='text' value='8' name='t1'><br>

        введіть число 2 :<br>
        <input type='text' value='4' name='t2'><br>
        <input type='submit' value='Обчислити'>
    </form>
</div>";

?>
