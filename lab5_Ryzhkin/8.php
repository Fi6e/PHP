<?php
require("../config.php");
echo "<hr><br>ПРИКЛАД 8 :<br>";
if (!empty($_GET["subdir"])) {
    echo "<p>Ім'я переданої змінної " . $_GET["subdir"];
} else {
    echo "<p>zminna subdir not found</p>";
}
$subdir = $_GET["subdir"];
$dir = "lab5_Popadynets/";
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
?>