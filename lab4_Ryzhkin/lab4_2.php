<?php
require("../config.php");
?>

<html>

<body>
<h1> Використання циклу foreach </h1> <?php
$names["Бойчук"] = "Іван";
$names["Мельник"] = "Борис";
$names["Швець"] = "Антон";
foreach ($names as $key => $value) {
    echo "<b>$value $key</b><br>";
}
?>
</body>
</html>
