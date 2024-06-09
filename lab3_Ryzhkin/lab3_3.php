<?php
require("../config.php");
$array = array(1, 5, 7, 5, 22, 18);
foreach ($array as $element) echo "<h3>$element<sup>2</sup>=" . $element ** 2 . " </h3>";
?>
