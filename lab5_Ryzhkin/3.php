<?php
require("../config.php");
echo "<hr><br>ПРИКЛАД 3 :<br>";
$file = "top.php"; 
infoFile($file);
function infoFile($f) {
    if (!file_exists($f)) { 
        echo "$f не знайдений!";
        return; 
    }
    echo "$f - " . (is_file($f) ? "" : "не ") . "файл<br>"; 
    echo "$f - " . (is_dir($f) ? "" : "не ") . "каталог<br>"; 
    echo "$f " . (is_readable($f) ? "" : "не ") . "доступний для читання<br>";
    echo "$f " . (is_writable($f) ? "" : "не ") . "доступний для запису<br>";
    echo "Розмір $f в байтах - " . (filesize($f)) . "<br>"; 
    echo "Остання зміна $f - " . (date("d MY H:i", filemtime($f))) . "<br>"; 
    echo "Останнє звернення до $f - " . (date("d MY H:i", fileatime($f))) . "<br>"; 
}
?>