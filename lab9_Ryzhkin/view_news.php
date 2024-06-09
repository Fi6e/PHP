<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);

mysqli_query($db_server,'SET NAMES utf8');
if ($db_server === false) {
    die("Помилка підключення: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $news_id = $_GET['id'];

    $query_news = mysqli_query($db_server, "SELECT * FROM popadynets_news WHERE id=$news_id");

    if (mysqli_num_rows($query_news) > 0) {
        $row = mysqli_fetch_assoc($query_news);
        $theme = $row['theme'];
        $title = $row['title'];
        $content = $row['content'];
        $date = $row['date'];

        echo "<h2>$title</h2>";
        echo "<p><strong>Тема:</strong> $theme</p>";
        echo "<p><strong>Дата:</strong> $date</p>";
        echo "<p>$content</p>";
    } else {
        echo "Новина не знайдена";
    }
} else {
    echo "Невірний запит";
}
mysqli_close($db_server);
?>
