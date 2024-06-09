<?php
require("../config.php");

// Масив авторів
$authors = array(
    array("surname" => "Шевченко", "name" => "Тарас", "books" => 4),
    array("surname" => "Франко", "name" => "Іван", "books" => 6),
    array("surname" => "Леся", "name" => "Українка", "books" => 3),
    array("surname" => "Гоголь", "name" => "Микола", "books" => 2),
    array("surname" => "Котляревський", "name" => "Іван", "books" => 1)
);

// Виведення таблиці авторів
echo "<h2>Список авторів:</h2>";
echo "<table border='1'>";
echo "<tr><th>Прізвище</th><th>Ім'я</th><th>Кількість книг</th></tr>";
foreach ($authors as $author) {
    echo "<tr><td>{$author['surname']}</td><td>{$author['name']}</td><td>{$author['books']}</td></tr>";
}
echo "</table>";

// Кількість авторів, що опублікували більше двох книг
$authors_with_more_than_two_books = array_filter($authors, function($author) {
    return $author['books'] > 2;
});
echo "<p>Кількість авторів, що опублікували більше двох книг: " . count($authors_with_more_than_two_books) . "</p>";

// Масив областей і міст
$regions = array(
    array("region" => "Львів", "cities" => array("Шевченка" => 900, "Коперника" => 1100, "Дорошенка" => 950)),
    array("region" => "Одеса", "cities" => array("Дерибасівська" => 2200, "Пушкінська" => 1800, "Рішельєвська" => 2300)),
    array("region" => "Івано-Франківськ", "cities" => array("Січових Стрільців" => 1800, "Галицька" => 1600, "Незалежності" => 1700))
);

   

// Знайдемо максимальну кількість мешканців серед вулиць
$max_population = max(array_merge(...array_map(function($region) {
    return $region["cities"];
}, $regions)));

// Виведемо інформацію про області та міста
echo "<table border='1'>";
echo "<tr><th>Місто</th><th>Вулиця</th><th>Населення</th></tr>";
foreach ($regions as $region) {
    $region_name = $region["region"];
    foreach ($region["cities"] as $city => $population) {
        echo "<tr><td>$region_name</td><td";
        if ($population == $max_population) {
            echo " style='color:purple;'";
        }
        echo ">$city</td><td>$population</td></tr>";
    }
}
echo "</table>";

// Додаткова таблиця для виведення загальної кількості населення кожного міста
echo "<br><br>";
echo "<table border='1'>";
echo "<tr><th>Місто</th><th>Загальна кількість населення з перерахованих вулиць</th></tr>";
foreach ($regions as $region) {
    $region_name = $region["region"];
    $total_population = array_sum($region["cities"]);
    echo "<tr><td>$region_name</td><td>$total_population</td></tr>";
}
echo "</table>";
?>
