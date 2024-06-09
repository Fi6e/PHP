<?php
require("../config.php");

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



function searchAndHighlight($search_word, $text_file_path) {
    $text = file_get_contents($text_file_path);
    $clean_text = preg_replace('/\s+/', ' ', htmlspecialchars($text));
    $sentences = explode('.', $clean_text);
    $results = [];

    foreach ($sentences as $sentence) {
        preg_match_all('/\b' . preg_quote($search_word, '/') . '\w*\b/ui', $sentence, $matches);
        $count = count($matches[0]);

        if ($count > 0) {
            $results[] = array('sentence' => $sentence, 'count' => $count);
        }
    }

    usort($results, function ($a, $b) {
        return $b['count'] - $a['count'];
    });

    foreach ($results as $result) {
        // Highlight the searched word with bold and red color
        $highlighted_sentence = preg_replace('/\b(' . preg_quote($search_word, '/') . '\w*)\b/ui', '<span style="font-weight: bold;">$1</span>', $result['sentence']);

        echo $highlighted_sentence . " ---> Кількість входжень слова '$search_word': " . $result['count'] . ")<br>";
    }
}

$search_word = 'тег';
$text_file_path = 'text.txt';


echo "<h3>Завдання 1: (А):Тег;</h3>";
searchAndHighlight($search_word, $text_file_path);
echo "<h3>Завдання 2 (Б):Html;</h3>";
searchAndHighlight('HTML', $text_file_path);

echo "<h3>Завдання 3 (В):частини слова, введеної в однорядкове текстове поле.</h3>";

echo "<div class='center'>";
echo "<form method='post'>
    <label for='search_word'>Введіть частину слова:</label><br>
    <input type='text' id='search_word' name='search_word'><br><br>
    <input type='submit' value='Пошук'>
</form>";
echo "</div>";

if ($_POST) {
    if (!empty($_POST["search_word"])) {
        $search_word = $_POST["search_word"];
        $text_file_path = 'text.txt';
        searchAndHighlight($search_word, $text_file_path);
    } else {
        echo "Будь ласка, введіть слово для пошуку.";
    }
}

?>
