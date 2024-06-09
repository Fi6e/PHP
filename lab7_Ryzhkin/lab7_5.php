<?php
require("../config.php");

class MultiplicationTable {
    private $number;

    public function __construct($number) {
        $this->number = $number;
    }

    private function calculateMultiplication($multiplier) {
        return $this->number * $multiplier;
    }

    public function generateTable() {
        echo "<table border='1'>";
        echo "<caption><b>Таблиця множення для числа:</b> {$this->number}</caption>";
        for ($i = 1; $i <= 10; $i++) {
            $result = $this->calculateMultiplication($i);
            echo "<tr>";
            echo "<td>{$this->number}</td>";
            echo "<td>*</td>";
            echo "<td>{$i}</td>";
            echo "<td>=</td>";
            echo "<td>{$result}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

// Створення об'єктів класу MultiplicationTable для демонстрації працездатності класу
$table2 = new MultiplicationTable(3);
$table2->generateTable();

$table7 = new MultiplicationTable(7);
$table7->generateTable();

$table5 = new MultiplicationTable(9);
$table5->generateTable();


?>

