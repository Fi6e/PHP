<?php
require("../config.php");

include_once 'function.php';
$x = 19;


function isNatural($number): bool
{
    return (floor($number) == $number) && ($number > 0);
}

if (!empty($_POST["x"])) {
    $x = $_POST['x'];

    if (isNatural($x)) {
        lab3_6($x);


    } else echo " <h3>число не натуральне </h3>";


}

echo "
<div>
<br>
    <form action='lab3_6.php' method='post'>
        введіть натуральне число :<br>
        <input type='text' value='$x' name='x'><br>

        
        <input type='submit' value='Обчислити'>
    </form>
</div>
";

include_once 'lab3_7.php';
?>
