<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);
$taskN = substr(basename(__FILE__), -5, 1);

// Змінна для підрахунку загальної кількості новин
$total_news_count = 0;
echo "<h2>Головне</h2>";
$query_main_news = mysqli_query($db_server, "SELECT * FROM popadynets_news ORDER BY date DESC LIMIT 3");

while ($row = mysqli_fetch_assoc($query_main_news)) {
    // Виводимо головні новини
    echo "<a href='view_news.php?id=" . $row['id'] . "'>" . $row['title'] . "</a><br>";
    // Інкрементуємо кількість новин
    $total_news_count++;
}

$query_themes = mysqli_query($db_server, "SELECT DISTINCT theme FROM popadynets_news");

while ($row = mysqli_fetch_assoc($query_themes)) {
    $theme = $row['theme'];
    echo "<h2><a href='theme_news.php?theme=$theme'>$theme</a></h2>";

    $query_news = mysqli_query($db_server, "SELECT * FROM popadynets_news WHERE theme='$theme' ORDER BY date DESC");

    while ($news_row = mysqli_fetch_assoc($query_news)) {
        // Виводимо новини по темі
        echo "<a href='view_news.php?id=" . $news_row['id'] . "'>" . $news_row['title'] . "</a><br>";
        // Інкрементуємо кількість новин
        $total_news_count++;
    }
}

// Шлях до файлу out.txt у директорії file
$out_file_path = '../file/out.txt';

// Записуємо загальну кількість новин у файл, перезаписуючи файл кожен раз
file_put_contents($out_file_path, $total_news_count, LOCK_EX);

mysqli_close($db_server);
?>
