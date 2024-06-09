<?php
require("../config.php");

function printWordsAlphabetically($filename)
{
    echo "<br><h2>Завдання 5.1 (Функція, що виводить слова заданого тексту у алфавітному порядку).</h2><br>";
    $text = file_get_contents($filename);
    $words = explode(" ", $text);
    sort($words);
    foreach ($words as $word) {
        echo $word . ", ";
    }
}

function printMostFrequentWords($filename)
{
    echo "<hr><br><h2> Завдання 5.2 (Задано текст. Вивести список двох слів, які найчастіше зустрічаються у тексті).
    </h2><br>";
    $text = file_get_contents($filename);
    $words = explode(" ", $text);
    $wordCount = array_count_values($words);
    arsort($wordCount);
    print_r(array_slice($wordCount, 0, 2));
}

function printLongestWords($filename)
{
    echo "<hr><br><h2>Завдання 5.3 (Задано текст. Вивести найдовше слово тексту і його довжину, вивести всі з них).</h2><br>";
    $text = file_get_contents($filename);
    $words = explode(" ", $text);
    $maxLength = 0;

    // Знайти максимальну довжину слова
    foreach ($words as $word) {
        // Видалення зайвих символів (крапок, ком, та ін.)
        $cleanedWord = trim($word, " \t\n\r\0\x0B.,;!?");
        $length = mb_strlen($cleanedWord, 'utf-8');
        if ($length > $maxLength) {
            $maxLength = $length;
        }
    }

    echo "Найдовше слово(-а) має(ють) довжину: $maxLength символів<br><br>";

    // Вивести всі слова з максимальною довжиною
    foreach ($words as $word) {
        // Видалення зайвих символів (крапок, ком, та ін.)
        $cleanedWord = trim($word, " \t\n\r\0\x0B.,;!?");
        if (mb_strlen($cleanedWord, 'utf-8') == $maxLength) {
            echo "$cleanedWord (довжина: $maxLength символів)<br>";
        }
    }
}


function printShortestWords($filename)
{
    echo "<hr><br><h2>Завдання 5.4 (Задано текст. Вивести найкоротше слово тексту і його довжину, вивести всі з них).</h2><br>";
    $text = file_get_contents($filename);
    $words = explode(" ", $text);
    $minLength = PHP_INT_MAX;

    // Знайти мінімальну довжину слова
    foreach ($words as $word) {
        // Видалення зайвих символів (крапок, ком, та ін.)
        $cleanedWord = trim($word, " \t\n\r\0\x0B.,;!?");
        $length = mb_strlen($cleanedWord, 'utf-8');
        if ($length < $minLength && $length > 0) { // Ensure length > 0 to avoid empty words
            $minLength = $length;
        }
    }

    echo "Найкоротше слово(-а) має(ють) довжину: $minLength символів<br><br>";

    // Вивести всі слова з мінімальною довжиною
    foreach ($words as $word) {
        // Видалення зайвих символів (крапок, ком, та ін.)
        $cleanedWord = trim($word, " \t\n\r\0\x0B.,;!?");
        if (mb_strlen($cleanedWord, 'utf-8') == $minLength) {
            echo "$cleanedWord (довжина: $minLength символів)<br>";
        }
    }
}


function findWordsStartingWithFirstLetter($filename)
{
    echo "<hr><br><h2>Завдання 5.5 ( Знайти в тексті всі слова, які починаються на першу літеру мого імені: Віктор). </h2><br>";
    $text = file_get_contents($filename);
    $words = explode(" ", $text);
    foreach ($words as $word) {
        if (mb_substr($word, 0, 1, 'utf-8') == 'в') {
            echo $word . "<br>";

        }
    }
}


function replaceLowercaseOWithUppercase($filename)
{
    echo "<hr><br><h2>Завдання 5.6 ( В тексті замінити всі малі літери “о” на великі “О”).</h2><br>";
    $text = file_get_contents($filename);
    $text = str_replace('о', 'О', $text);
    echo $text;
}


function printRandomParagraph()
{
    echo "<hr><br><h2>Завдання 5.7 (Створити РНР-сценарій, який випадковим чином виводить абзац тексту з п’яти заданих абзаців).</h2><br>";
    $texts = explode("\n", file_get_contents("all.txt"));
    $randomIndex = array_rand($texts);
    echo $texts[$randomIndex];
}


$filename = "Popadynets.txt";
printWordsAlphabetically($filename);
printMostFrequentWords($filename);
printLongestWords($filename);
printShortestWords($filename);
findWordsStartingWithFirstLetter($filename);
replaceLowercaseOWithUppercase($filename);
printRandomParagraph();


?>