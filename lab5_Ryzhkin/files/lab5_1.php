<?php
require("../config.php");
echo "<hr><br>ПРИКЛАД 1 :<br>";
include 'top1.php'; 
echo "<H2>...Основна частина...</H2>"; 

echo "<hr><br>ПРИКЛАД 2 :<br>";
$a = include 'top.php'; 
echo "<H2> Включений файл повернув $a</H2>"; 


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

echo "<hr><br>ПРИКЛАД 4 :<br>";
$fp = fopen("example1.txt", "r") or die("Не вдалося відкрити файл!");
while (!feof($fp)) {
    echo fgets($fp, 1024) . "<br>"; 
}
fclose($fp);


echo "<hr><br>ПРИКЛАД 8 :<br>";

if (!empty($_GET["subdir"])) {
    echo "<p>Ім'я переданої змінної " . $_GET["subdir"];
} else {
    echo "<p>zminna subdir not found</p>";
}
$subdir = $_GET["subdir"];
$dir = "";
echo
"<div align='center'>
<form action='?subdir=$subdir' method='post' enctype='multipart/form-data'>
<input type='file' name='uploadfile'>
<input type='submit' value='Завантажити'>
</form></div>";
$uploaddir = "./files/$subdir/";
echo "<p>uploaddir=$uploaddir";
$uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);
echo "<p>uploadfile=$uploadfile";
if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile)) {
    echo "<p>Файл завантажений на сервер";
} else {
    echo "<p>Файл нe завантажений на сервер!";
}
echo "<p>Оригінальна назва: " . $_FILES['uploadfile']['name'] . "</p>";
echo "<p>Тип: " . $_FILES['uploadfile']['type'] . "</p>";
echo "<p>Розмір: " . $_FILES['uploadfile']['size'] . "</p>";
echo "<p>Тимчасова назва: " . $_FILES['uploadfile']['tmp_name'] . "</p>";

echo "<hr><br>ПРИКЛАД 4 :<br>";
$fp = fopen("example1.txt", "r") or die("Не вдалося відкрити файл!");
while (!feof($fp)) {
    echo fgets($fp, 1024) . "<br>"; 
}
fclose($fp);


?>