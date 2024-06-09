<?php
require("../config.php");
?>
<table style="border: solid 1px black">
    <tr>
        <th>Тег</th>
        <th>Опис</th>
    </tr>

    <?php
    $file = fopen("tag1.txt", "r");

    while (!feof($file)) {
        echo "<tr>";
        $tag = fgets($file);
        $description = fgets($file);
        echo "<td style='border: solid 1px black'>&lt;" . htmlspecialchars(trim($tag)) . "&gt;</td>";
        echo "<td style='border: solid 1px black'>" . htmlspecialchars(trim($description)) . "</td>";
        echo "</tr>";
    }

    fclose($file);
    ?>
</table>
