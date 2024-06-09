<?php
require("../config.php");
echo "<hr><br>ПРИКЛАД 4 :<br>";
$fp = fopen("example1.txt", "r") or die("Не вдалося відкрити файл!");
while (!feof($fp)) {
    echo fgets($fp, 1024) . "<br>"; 
}
fclose($fp);
?>