<?php
require("../config.php");
//include_once("../db.php");
// include_once("../function.php");
header("Content-Type: text/html; charset=" . $config{'charset'});
?>
<html lang="ua">
<head>
    <title>Приклад оператора switch</title>
</head>
<body>
<?php
if (!empty($_POST["choice"]) && !empty($_POST["t1"]) && !empty($_POST["t2"]) && !empty($_POST["t3"])) {
    $number = $_POST['choice'];
    $t1 = $_POST["t1"];
    $t2 = $_POST["t2"];
    $t3 = $_POST["t3"];
    $result = null;

    switch ($number) {
        case '1':
            $result = max($t1, $t2, $t3);
            break;
        case '2':
            $result = min($t1, $t2, $t3);
            break;
        case '3':
            $result = ($t1 + $t2 + $t3) / 3;
            break;
        default:
            echo "Некоректно введені дані, повторіть спробу";
            break;
    }
    echo " <h2>" . ($result) . " </h2>";

}

echo "
<div>
    Введіть номер завдання:<br>
    1 - обчислення максимальної температури<br>
    2 - обчислення мінімальної температури<br>
    3 - обчислення середньої температури<br>

    <form action='task7.php' method='post'>
        Введіть число:<br>
        <input type='text' name='choice'><br>

        введіть температуру 1 :<br>
        <input type='text' value='37' name='t1'><br>

        введіть температуру 2 :<br>
        <input type='text' value='17' name='t2'><br>

        введіть температуру 3 :<br>
        <input type='text' value='7' name='t3'><br>


        <input type='submit' value='Обчислити'>
    </form>
</div>
<h3 class='back'><a href='../lab1.php'>Назад</a></h3>";
?>

</body>
</html>