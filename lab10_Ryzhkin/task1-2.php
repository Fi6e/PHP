<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);
$taskN = "1-3";
include '../templates/task_top.php';


SetCookie("Test", "Value");

SetCookie("My_Cookie", "Value", time() + 3600);



echo "В цьому прикладі реалізовано роботу Cookies";

if (SetCookie("Test", "Value"))
    echo "<h3>Cookies успішно інстальовано!</h3>";
else echo "<h3>Cookies встановити не вдалося! :( </h3>";


echo $_COOKIE['my_cookie'];

setcookie("test", " Hello Reader!", time() + 3600);

echo @$_COOKIE['test'];


if (isset($_COOKIE['Mortal']))
    $cnt = $_COOKIE['Mortal'] + 1;
else $cnt = 0;

setcookie("Mortal", $cnt, 0x6FFFFFFF);

echo "<p>Ви були на цій сторінці: <b>" . @$_COOKIE['Mortal'] . "</b> раз</p>";


SetCookie("Test", "");



setcookie("cookie[1]", '1');
setcookie('cookie[2]', '2');
setcookie('cookie[3]', '3');

if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $name => $value) {
        echo "$name: $value <br>";
    }
}


?>
