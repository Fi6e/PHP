<?php
require("../config.php");
      $countries = array(
        "Ukraine" => array("name" => "Україна", "capital" => "Київ", "popul" => 42),
        "Poland" => array("name" => "Польща", "capital" => "Варшава", "popul" => 35),
        "Romania" => array("name" => "Румунія", "capital" => "Бухарест", "popul" => 19)
    );
    

echo "<table border='1'>";
echo "<tr><th>Назва</th><th>Столиця</th><th>Населення, млн.ч.</th></tr>";
foreach ($countries as $country) {
    echo "<tr>";
    echo "<td>{$country['name']}</td>";
    echo "<td>{$country['capital']}</td>";
    echo "<td>{$country['popul']}</td>";
    echo "</tr>";
}
echo "</table>";

foreach ($countries as $countryName => $countryData) {
    echo "Столиця {$countryData['name']} 
    — {$countryData['capital']},населення 
    — {$countryData['popul']} млн. ч.;<br>";
}

ksort($countries);
foreach ($countries as $countryName => $countryData) {
    echo "$countryName:<br>";
    foreach ($countryData as $key => $value) {
        echo "$key=>$value<br>";
    }
}

echo "<pre>";
print_r($countries);
echo "</pre>";
?>
