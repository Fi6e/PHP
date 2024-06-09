<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);

mysqli_query($db_server,'SET NAMES utf8');
if (isset($_GET['theme'])) {
    $theme = $_GET['theme'];
    $query_news = mysqli_query($db_server, "SELECT * FROM popadynets_news WHERE theme = '$theme' ");
    echo "<h2>$theme</h2>";
    while ($row = mysqli_fetch_assoc($query_news)) {
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['content'] . "</p>";
    }

} else {
    echo "Тема новини не вказана.";
}

mysqli_close($db_server);
?>
