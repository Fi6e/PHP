<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);
$taskN = substr(basename(__FILE__), -5, 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theme = mysqli_real_escape_string($db_server, $_POST['theme']);
    $title = mysqli_real_escape_string($db_server, $_POST['title']);
    $content = mysqli_real_escape_string($db_server, $_POST['content']);

    $date = date("Y-m-d");
    $query_insert_news = mysqli_query($db_server, "INSERT INTO popadynets_news (id, theme, title, content, date) VALUES ('$id', '$theme', '$title', '$content', '$date')");

    if ($query_insert_news) {
        echo "Новина успішно додана.";
    } else {
        echo "Помилка: " . mysqli_error($db_server);
    }
}
mysqli_close($db_server);
?>

    <form method="post">
        <label for="theme">Тема:</label><br>
        <input type="text" id="theme" name="theme"><br>

        <label for="title">Заголовок:</label><br>
        <input type="text" id="title" name="title"><br>

        <label for="content">Контент:</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br>

        <input type="submit" value="Додати новину">
    </form>
