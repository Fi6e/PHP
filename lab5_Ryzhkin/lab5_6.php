<?php
require("../config.php");
$texts = explode("\n", file_get_contents("all.txt"));

// Об'єднуємо всі тексти в один рядок
$all_text = implode(" ", $texts);

// Розбиваємо рядок на слова
$words = preg_split('/\s+/', $all_text, -1, PREG_SPLIT_NO_EMPTY);

echo "<br><h2>Завдання 19. Розділити заданий текст на декілька масивів, що можуть містити не більше 20 символів.</h2><br>";

function splitTextIntoChunks($text, $max_length = 20) {
    $chunks = [];
    $current_chunk = '';

    $words = preg_split('/\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($words as $word) {
        if (mb_strlen($current_chunk . ' ' . $word, 'UTF-8') <= $max_length) {
            $current_chunk .= (empty($current_chunk) ? '' : ' ') . $word;
        } else {
            $chunks[] = $current_chunk;
            $current_chunk = $word;
        }
    }

    if (!empty($current_chunk)) {
        $chunks[] = $current_chunk;
    }

    return $chunks;
}

$chunks = splitTextIntoChunks($all_text);
foreach ($chunks as $index => $chunk) {
    echo "Частина " . ($index + 1) . ": $chunk<br>";
}

echo "<br><h2>Завдання 20. Перевірити текст на наявність однакових слів, вивести ці слова.</h2><br>";

$word_counts = array_count_values($words);
$duplicate_words = array_filter($word_counts, function($count) {
    return $count > 1;
});

echo "Однакові слова у тексті:<br>";
foreach ($duplicate_words as $word => $count) {
    echo "$word - $count разів<br>";
}

echo "<br><h2>Завдання 21. Замінити в тексті усі подвійні лапки на одинарні, а крапки - трьома крапками.</h2><br>";

$modified_text = str_replace('"', "'", $all_text);
$modified_text = str_replace('.', '...', $modified_text);

echo "Модифікований текст:<br>";
echo nl2br($modified_text);

?>
