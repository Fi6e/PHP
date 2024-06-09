<?php
require("../config.php");

// Оголошення класу Student
class Student {
    public $name;
    public $surname;
    public $group;

    // Конструктор класу з початковими значеннями властивостей
    public function __construct($name = "-", $surname = "-", $group = "-") {
        $this->name = $name;
        $this->surname = $surname;
        $this->group = $group;
    }

    // Метод для виведення інформації про студента
    public function getInfo() {
        echo "Name: {$this->name}<br>";
        echo "Surname: {$this->surname}<br>";
        echo "Group: {$this->group}<br>";
    }
}

// Створення трьох об'єктів класу Student з довільними значеннями
$student1 = new Student("Victor", "Popadynets", "IPZ-23");
$student2 = new Student("Sofia", "Kovaleva", "TRN-46");
$student3 = new Student("Maxim", "Ivanov", "OSV-71");



// Створення додатково трьох об'єктів класу Student з використанням конструктора з початковими значеннями
$student4 = new Student("Alex");
$student5 = new Student("Lesya", "Sokolova");
$student6 = new Student("Victus", "Octopus", "PI-01");

// Виведення інформації про кожного студента
echo "<h3>Новостворені студенти:</h3>";
$student4->getInfo();
echo "<br>";
$student5->getInfo();
echo "<br>";
$student6->getInfo();
echo "<h3>Існуючі студенти:</h3>";
$student1->getInfo();
echo "<br>";
$student2->getInfo();
echo "<br>";
$student3->getInfo();

?>

