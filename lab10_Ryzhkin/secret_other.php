<?php
session_start();
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);


if (isset($_SESSION['username'])) {
    echo "Ви увійшли як користувач <b>" . $_SESSION['username'] . "</b>
    (Ви отримали доступ до секретної інформації!)";
    echo '<a href="secret_info.php"><br>До секретної інформації</a><br>';
    echo '<a href="destroy_session.php">Назад (Знищити сесію)</a>';
} else {
    echo "Ви увійшли як гість";
    header("Location: authorize.php");
    exit();
}
?>