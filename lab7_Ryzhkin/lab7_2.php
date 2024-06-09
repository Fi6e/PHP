<?php
require("../config.php");
// Оголошення класу Student
class Student {
    public $name;
    public $surname;
    public $group;

    // Конструктор класу
    public function __construct($name, $surname, $group) {
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

// Створення три об'єктів класу Student з довільними значеннями
$student1 = new Student("Victor", "Popadynets", "IPZ-23");
$student2 = new Student("Sofia", "Kovaleva", "TRN-46");
$student3 = new Student("Maxim", "Ivanov", "OSV-71");



// Виведення інформації про кожного студента викликом методу getInfo()
$student1->getInfo();
echo "<br>";
$student2->getInfo();
echo "<br>";
$student3->getInfo();

?>

