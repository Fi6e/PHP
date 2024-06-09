<?php
require("../config.php");
$ln = substr(basename(__DIR__), 3, 1);
$taskN = substr(basename(__FILE__), -5, 1);

$imgs = array('Носки', 'Боді', "Капелюх", "Сукня", "Куртка", "Сумка");

echo "<style>
.child-images {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 800px;
    margin: 0 auto;
}

.child-images img {
    max-width: 300px;
    max-height: 300px;
    margin: 5px;
}
</style>";




if (!empty($_GET["choice"]) && !empty($_GET["n"])) {
    $number = $_GET['choice'];
    $n = $_GET["n"];
    echo "<h2>Ви обрали '" . $imgs[$number - 1] . "'</h2>";
    echo "<img src='images/child_{$number}.png'>";

    if ($n == $number) {
        echo "<h2>Маєте рацію!</h2>";
    } else {
        echo "<h2>Ви помилились!</h2>";
    }

} else {

    $f1 = array_rand($imgs);
    $f2 = array_rand($imgs);
    while ($f1 == $f2) $f2 = array_rand($imgs);

    $rand = array_rand($imgs);
    while ($rand == $f1 || $rand == $f2) $rand = array_rand($imgs);
    $rand++;


    echo "<p>Оберіть дитячий одяг: " . $imgs[$rand - 1] . "</p>";
    echo "<div class='child-images'>";
    for ($i = 1; $i <= 6; $i++) {
        if ($i - 1 == $f1 || $i - 1 == $f2) continue;
        echo "<a href='lab2_5.php?choice=$i&n=$rand'><img src='images/child_{$i}.png'>
        <p>".$imgs[$i-1]."</p></a>";
    }
    echo "</div>";
}

?>
