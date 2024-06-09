<?php
require("../config.php");
?>
<form method="post">
    <label for="filename">Введіть ім'я файлу:</label>
    <input type="text" id="filename" name="filename" placeholder="Введіть ім'я файлу"
           value="lab5_1.php">
    <button type="submit" name="submit">Готово</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $filename = $_POST['filename'];

    if (file_exists($filename)) {
        echo "<p>Файл з іменем $filename існує.</p>";
        echo "<p>Інформація про файл:</p>";
        echo "<ul>";
        echo "<li>Розмір: " . filesize($filename) . " байт</li>";
        echo "<li>Час створення: " . date("Y-m-d H:i:s", filectime($filename)) . "</li>";
        echo "<li>Час останньої модифікації: " . date("Y-m-d H:i:s", filemtime($filename)) . "</li>";
        echo "<li>Вміст файлу:</li>";
        echo "<pre>" . htmlspecialchars(file_get_contents($filename)) . "</pre>";
        echo "</ul>";
    } else {
        echo "<p>Файл з іменем $filename у поточному каталозі не існує.</p>";
    }
}
?>
