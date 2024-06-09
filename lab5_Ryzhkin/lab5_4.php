<?php
require("../config.php");
$file_path = "tag2.txt";
$out_file = "out1.txt";
$file = fopen($file_path, "r");
$num_tags = 0;

echo "<table border='1'>";
echo "<tr><th>Тег</th><th>Опис</th></tr>";

while (($line = fgets($file)) !== false) {
    $num_tags++;
    echo "<tr>";
    // Розділити рядок на тег і опис
    list($tag, $description) = explode('> ', $line, 2);
    $tag = trim($tag) . '>'; // Повертаємо закриваючий символ тега
    $description = trim($description);
    echo "<td style='border: solid 1px black'>" . htmlspecialchars($tag) . "</td>";
    echo "<td style='border: solid 1px black'>" . htmlspecialchars($description) . "</td>";
    echo "</tr>";
}

echo "</table>";

file_put_contents($out_file, "Всього у файлі tag2.txt описано тегів: $num_tags");

$out_contents = file_get_contents($out_file);
echo "<p>$out_contents</p>";

fclose($file);
?>
