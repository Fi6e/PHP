<?php
require("../config.php");

class Country {
    public $name;
    public $population;
    public $capital;

    public function __construct($name, $population, $capital) {
        $this->name = $name;
        $this->population = $population;
        $this->capital = $capital;
    }
}

// Створення масиву об'єктів класу Country
$countries = array(
    new Country("Polish", 36800000, "Varshava"),
    new Country("Pakistan", 235000000, "Izlamabad"),
    new Country("Portugal", 10410000, "Lisbon")
);


// Виведення об'єктів у таблицю
echo "<table border='1'>";
foreach ($countries as $country) {
    echo "<tr>";
    echo "<td>Name</td><td>{$country->name}</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Population</td><td>{$country->population}</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Capital</td><td>{$country->capital}</td>";
    echo "</tr>";
}
echo "</table>";

?>

