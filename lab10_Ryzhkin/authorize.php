<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user_for_session WHERE username = ? AND password = ?";
    $stmt = $db_server->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: secret_other.php");
        exit();
    } else {
        echo "Invalid credentials";
    }
}
?>

<form method="POST">
    <label for="username">Логін:</label>
    <input type="text" id="username" name="username"><br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Submit">
</form>
<a href="lab10.php">Назад</a>