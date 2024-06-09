<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO user_for_session (username, password) VALUES (?, ?)";
    $stmt = $db_server->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();

    header("Location: lab10.php");
    exit();
}

$query = "SELECT * FROM user_for_session";
$result = $db_server->query($query);

if ($result === false) {
    echo "Error: " . $db_server->error;
} else {
    echo '<table border="1">';
    echo '<tr><th>Логін</th><th>Пароль</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['username'] . '</td><td>' . $row['password'] . '</td></tr>';
    }
    echo '</table>';
}
?>

<form method="POST">
    <table>
        <tr>
            <td><label for="username">Логін:</label></td>
            <td><input type="text" id="username" name="username"></td>
        </tr>
        <tr>
            <td><label for="password">Пароль:</label></td>
            <td><input type="password" id="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="Зареєструватися">
            </td>
        </tr>
    </table>
</form>
