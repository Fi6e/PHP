<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);

// Перевіряємо, чи існує таблиця 
$table_check_query = mysqli_query($db_server, "SHOW TABLES LIKE 'popadynets_news'");
$table_exists = mysqli_num_rows($table_check_query) > 0;

// Якщо таблиця не існує, створюємо її
if (!$table_exists) {
    mysqli_query($db_server, "CREATE TABLE popadynets_news (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    theme VARCHAR(100),
    title VARCHAR(255) UNIQUE,
    content TEXT,
    date DATE
) DEFAULT CHARSET=utf8;
");
    
    // Додаємо дані з файлу
    $file = "files/news.txt";
    $fdata_my = fopen($file, "r") or die("Can't open file $file!");
    $mas = fread($fdata_my, filesize($file));
    $mas = explode("&", $mas);

    foreach ($mas as $news) {
        $mas_vidm = explode("~", $news);
        $theme = trim(preg_replace('/\s\s+/', ' ', $mas_vidm[0]));
        $title = trim(mysqli_real_escape_string($db_server, $mas_vidm[1]));
        $content = trim(mysqli_real_escape_string($db_server, $mas_vidm[2]));
        $date = trim(mysqli_real_escape_string($db_server, $mas_vidm[3]));

        $res = mysqli_query($db_server, "INSERT INTO popadynets_news (theme, title, content, date) VALUES ('$theme', '$title', '$content', '$date')");
    }
    fclose($fdata_my);
}

$current_year = date("Y");
$themes = [];

$query_themes = mysqli_query($db_server, "SELECT DISTINCT theme FROM popadynets_news");

while ($row = mysqli_fetch_assoc($query_themes)) {
    $theme = $row['theme'];
    $themes[] = $theme;

    $query_check = mysqli_query($db_server, "SELECT * FROM popadynets_news WHERE theme='$theme' AND YEAR(date)=$current_year LIMIT 1");
    if (mysqli_num_rows($query_check) == 0) {
        $fake_date = date("Y-m-d", strtotime("$current_year-01-01"));
        $title = "Новина з $theme";
        $content = "Lorem ipsum dolor sit amet";

        mysqli_query($db_server, "INSERT INTO popadynets_news (theme, title, content, date) VALUES ('$theme', '$title', '$content', '$fake_date')");
    }
}

$query = mysqli_query($db_server, "SELECT id, theme, title, content, date FROM popadynets_news");



echo "<table>";
echo "<tr><th>ID</th><th>Тема</th><th>Заголовок</th><th></th><th>Дата</th></tr>";
while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['theme'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row[''] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
