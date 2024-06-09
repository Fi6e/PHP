<?php
require("../config.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();
    if (empty($_POST["surname"])) {
        $errors[] = "Surname є обов'язковим полем!";
    } else {
        $surname = $_POST["surname"];
    }

    if (empty($_POST["name"])) {
        $errors[] = "Name є обов'язковим полем!";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["email"])) {
        $errors[] = "@Gmail є обов'язковим полем!";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Неправильний формат @Gmail!";
        }
    }

    if (empty($_POST["password"])) {
        $errors[] = "Password є обов'язковим полем!";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["confirm_password"])) {
        $errors[] = "Повторіть пароль!";
    } else {
        $confirm_password = $_POST["confirm_password"];
    }

    if ($password !== $confirm_password) {
        $errors[] = "Паролі не співпадають!";
    }

    if (!empty($errors)) {
        echo "<h2>Помилка!:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2><b>Користувацька Інформація:</b></h2>
        <table border='1'>
        <tr><th>Поле</th><th>Значення</th></tr>
        <tr><td>Прізвище</td><td>$surname</td></tr>
        <tr><td>Ім'я</td><td>$name</td></tr>
        <tr><td>E-mail</td><td>$email</td></tr>
        <tr><td>Пароль</td><td>$password</td></tr>
        </table>";
    }
}
?>
 
<h2><b>Сторінка Регістрації:</b></h2>

<form method="post">
    <label for="surname"><b>Прізвище:</b></label><br>
    <input type="text" id="surname" name="surname" value="<?php if (isset($surname)) echo $surname; ?>"><br>
    <label for="name"><b>Ім'я:</b></label><br>
    <input type="text" id="name" name="name" value="<?php if (isset($name)) echo $name; ?>"><br>
    <label for="email"><b>Пошта</b></label><br>
    <input type="email" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>"><br>
    <label for="password"><b>Пароль:</b></label><br>
    <input type="password" id="password" name="password"><br>
    <label for="confirm_password"><b>Повторіть пароль:</b></label><br>
    <input type="password" id="confirm_password" name="confirm_password"><br><br>
    <input type="submit" value="Ready">
</form>

