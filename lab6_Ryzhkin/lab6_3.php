<?php
require("../config.php");
// Зчитуємо вміст файлу example.txt
$original_text = file_get_contents("example.txt");
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


// Виводимо початковий текст
echo "<h3>Початковий текст:</h3>";
echo "<pre>" . htmlspecialchars($original_text) . "</pre>";

// Функція для заміни відкриваючих і закриваючих тегів на пропуски
function remove_tags($html) {
    return preg_replace('/<[^>]*>/', ' ', $html);
}

// Зчитуємо вміст файлу example.txt
$text = file_get_contents("example.txt");

// Замінюємо відкриваючі і закриваючі теги на пропуски
$cleaned_text = remove_tags($text);

// Замінюємо подвійні пропуски на один пробіл
$cleaned_text = preg_replace('/\s+/', ' ', $cleaned_text);

// Виводимо утворений текст
echo "<h3>Відредагований текст:</h3>";
echo "<pre>" . htmlspecialchars($cleaned_text) . "</pre>";
?>
