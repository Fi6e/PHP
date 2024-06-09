<?php
require("../config.php");

// Зчитуємо вміст файлу text.txt
$text = file_get_contents("text.txt");

// Виводимо HTML з вбудованими стилями для центрування тексту
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        h3 {
            margin-top: 20px;
        }
        pre {
            display: inline-block;
            text-align: left;
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
';

echo "<h3>(А) Весь заданий текст:</h3>";
echo "<pre>" . htmlspecialchars($text) . "</pre>";

// Знаходимо всі відкриваючі теги
preg_match_all('/<\w+/', $text, $matches);

// Виводимо тільки назви відкриваючих тегів
echo "<h3>(Б) Тільки назви відкриваючих тегів:</h3>";
echo "<pre>";
foreach ($matches[0] as $tag) {
    // Віддрукуємо лише ім'я тегу без кутових дужок
    echo substr($tag, 1) . "<br>";
}
echo "</pre>";

// Виводимо назви відкриваючих тегів разом із кутовими дужками
echo "<h3>(В) Назви відкриваючих тегів разом із кутовими дужками:</h3>";
echo "<pre>";
foreach ($matches[0] as $tag) {
    // Віддрукуємо тег разом із кутовими дужками
    echo htmlspecialchars($tag) . "<br>";
}
echo "</pre>";

echo '
</body>
</html>
';
?>
