
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
}
// Створення три об'єктів класу Student з довільними значеннями

$student1 = new Student("Victor", "Popadynets", "IPZ-23");
$student2 = new Student("Sofia", "Kovaleva", "TRN-46");
$student3 = new Student("Maxim", "Ivanov", "OSV-71");

// Виведення інформації про кожного студента у стовпчики
echo "<table border='1'>";
echo "<tr><th>Student 1</th><th>Student 2</th><th>Student 3</th></tr>";
echo "<tr><td>{$student1->name}<br>{$student1->surname}<br>{$student1->group}</td>";
echo "<td>{$student2->name}<br>{$student2->surname}<br>{$student2->group}</td>";
echo "<td>{$student3->name}<br>{$student3->surname}<br>{$student3->group}</td></tr>";
echo "</table>";

?>