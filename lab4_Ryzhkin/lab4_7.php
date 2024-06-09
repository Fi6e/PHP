<?php
require("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blank = "відповіді не надано";
    $q1 = $_POST['q1'] ?: $blank;
    $q2 = $_POST['q2'] ?: [];
    $q3 = $_POST['q3'] ?: [];
    $q4 = $_POST['q4'] ?: $blank;

    echo "<p>1. Який ваш улюблений сезон?</p>";
    echo "Відповідь: " . $q1 . "<br>";

    echo "<p>2. Як ви проводите вільний час?</p>";
    echo "Відповідь: ";
    echo !$q2 ? "відповіді не надано" : "";
    foreach ($q2 as $activity) {
        echo "$activity ";
    }
    echo "<br>";

    echo "<p>3. Який ваш улюблений жанр музики?</p>";
    echo "Відповідь: ";
    echo !$q3 ? "відповіді не надано" : "";
    foreach ($q3 as $genre) {
        echo "$genre ";
    }
    echo "<br>";

    echo "<p>Скільки часу ви проводите в Інтернеті щодня?</p>";
    echo "Відповідь: " . $q4 . "<br>";
}
?>

<h2><b>Користувацька Анкета:</b></h2>

<form method="post">
    <p>1. Який ваш улюблений сезон?</p>
    <input type="radio" id="Spring" name="q1" value="Весна">
    <label for="Spring">Весна</label><br>
    <input type="radio" id="Summer" name="q1" value="Літо">
    <label for="Summer">Літо</label><br>
    <input type="radio" id="Autumn" name="q1" value="Осінь">
    <label for="Autumn">Осінь</label><br>
    <input type="radio" id="Winter" name="q1" value="Зима">
    <label for="Winter">Зима</label><br>

    <p>2. Як ви проводите вільний час?</p>
    <input type="checkbox" id="Reading" name="q2[]" value="Читання">
    <label for="Reading">Читання</label><br>
    <input type="checkbox" id="WatchingTV" name="q2[]" value="Перегляд телевізора">
    <label for="WatchingTV">Перегляд телевізора</label><br>
    <input type="checkbox" id="Hiking" name="q2[]" value="Піші прогулянки">
    <label for="Hiking">Піші прогулянки</label><br>
    <input type="checkbox" id="Cooking" name="q2[]" value="Готування їжі">
    <label for="Cooking">Готування їжі</label><br>

    <p>3. Який ваш улюблений жанр музики?</p>
    <select name="q3[]" multiple>
        <option value="Поп">Поп</option>
        <option value="Рок">Рок</option>
        <option value="Класика">Класика</option>
        <option value="Джаз">Джаз</option>
    </select><br>

    <p>Скільки часу ви проводите в Інтернеті щодня?</p>
    <select name="q4">
        <option value="Менше години">Менше години</option>
        <option value="1-2 години">1-2 години</option>
        <option value="Більше 2 годин">Більше 2 годин</option>
        <option value="Не користуюсь">Не користуюсь</option>
    </select><br>

    <br>
    <input type="submit" value="Відправити">
</form>
