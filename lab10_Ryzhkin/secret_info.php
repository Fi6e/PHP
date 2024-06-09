<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);

session_start();

if (isset($_SESSION['username'])) {
    echo "Ви увійшли як користувач " . $_SESSION['username'] . "<br>
    Ви знаходитеся у секретній інформації<br>";
} else {
    echo "Ви увійшли як <b>гість</b><br>";
}
?>
<html>
<head><title>Secret info</title></head>
<body>
<a href="secret_other.php">secret_other</a>
<br><br>

</body>
</html>
