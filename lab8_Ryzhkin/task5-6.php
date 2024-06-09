<?php
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);
$taskN = "5-6";

// Create the table if it does not exist
mysqli_query($db_server, "CREATE TABLE IF NOT EXISTS shop(
    id INTEGER PRIMARY KEY AUTO_INCREMENT, 
    cost INTEGER, 
    mes VARCHAR(50),  
    name VARCHAR(50) UNIQUE, 
    av_numb INTEGER,
    img VARCHAR(255)
)");

// Handle purchase and addition
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['buy']) || isset($_POST['add'])) {
        $id = intval($_POST['id']);
        $quantity = intval($_POST['quantity']);
        $operation = isset($_POST['buy']) ? 'buy' : 'add';

        // Get the current stock
        $result = $db_server->query("SELECT av_numb FROM shop WHERE id = $id");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($operation == 'buy') {
                if ($row['av_numb'] >= $quantity) {
                    // Update the stock
                    $new_av_numb = $row['av_numb'] - $quantity;
                    $db_server->query("UPDATE shop SET av_numb = $new_av_numb WHERE id = $id");
                } else {
                    echo "<div style='color: red;'>Ви не можете купити більше, ніж є в наявності.</div>";
                }
            } elseif ($operation == 'add') {
                // Update the stock by adding quantity
                $new_av_numb = $row['av_numb'] + $quantity;
                $db_server->query("UPDATE shop SET av_numb = $new_av_numb WHERE id = $id");
            }
        }
    }
}

// Fetch all products
$sql = "SELECT * FROM shop";
$result = $db_server->query($sql);

echo "<div style='display: flex; flex-wrap: wrap;'>";

while ($row = $result->fetch_assoc()) {
    echo "<div style='border: 1px solid grey; padding: 10px; margin: 10px;'>";
    echo "<a href='product.php?id=" . $row['id'] . "'><img width='200' src='files/" . $row['img'] . "' alt='Image'></a><br>";
    echo "<a href='product.php?id=" . $row['id'] . "'>" . $row['name'] . "</a><br>";
    echo "Ціна: " . $row['cost'] . " Грн/" . $row['mes'] . "  <br>";
    echo "Кількість: " . $row['av_numb'] . "<br>";
    
    if ($row['av_numb'] > 0) {
        echo "<form method='POST'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='number' name='quantity' min='1' required>";
        echo "<button type='submit' name='buy'>Купити</button>";
        echo "<button type='submit' name='add'>Додати товар</button>";
        echo "</form>";
    } else {
        echo "<span style='color: red;'>Товар закінчився!</span>";
    }
    
    echo "</div>";
}

echo "</div>";
$db_server->close();
?>
