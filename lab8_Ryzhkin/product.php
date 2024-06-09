<?php
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);
$taskN = "product";

mysqli_query($db_server, "CREATE TABLE IF NOT EXISTS shop(id INTEGER PRIMARY KEY AUTO_INCREMENT, 
        cost INTEGER, mes VARCHAR(50), name VARCHAR(50) UNIQUE, av_numb INTEGER)");

if ($_POST['quantity']) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $reveres = $_POST['reveres'];

    // Перевірка, щоб кількість була не менше нуля
    if ($quantity < 0) {
        echo "<script>alert('Введіть додатнє значення кількості товару.')</script>";
        echo "<script>window.history.back()</script>";
        exit;
    }

    if ($reveres == "true") {
        echo "<h1>$reveres</h1>";
        $quantity = -1 * $quantity;
    }

    $sql = "UPDATE shop SET av_numb = av_numb - $quantity WHERE id = $id";
    $db_server->query($sql);

    $db_server->close();
    header('Location: ' . 'task5-6.php');
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM shop WHERE id = $id";
    $result = $db_server->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>" . $row['name'] . "</h2>";
        echo "<p>Ціна: " . $row['cost'] . " Грн/" . $row['mes'] . "</p>";
        echo "<p>Кількість: " . $row['av_numb'] . "</p>";
        echo "<form action='product.php' method='post'><input type='number' name='quantity' value='1'>";
        echo "<input hidden type='number' name='id' value='" . $row['id'] . "'>";
        echo "<button name='reveres' value='true' type='submit'>Додати товар</button></form>";
    } else {
        echo "Товар не знайдено!";
    }
} else {
    echo "ID Товару не знайдено!";
}

$db_server->close();
?>
