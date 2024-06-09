<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h3 {
            margin-top: 20px;
        }
        pre {
            display: inline-block;
            text-align: left;
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
<?php
require("../config.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postcode = $_POST["postcode"];
    $pattern = "/^[1-7]\d{3}$/";

    if (preg_match($pattern, $postcode)) {
        echo "<p style='color:green;'>Поштовий індекс введено коректно!</p>";
    } else {
        echo "<p style='color:red;'>Поштовий індекс введено некоректно. Будь ласка, введіть відповідно до формату: чотири цифри. Перша цифра від 1 до 7.</p>";
    }
}
?>

<h2>Введіть поштовий індекс для Македонії</h2>
<p><strong>Вимоги для введення поштового індексу:</strong> Чотири цифри. Перша цифра від 1 до 7.</p>
<p><strong>Зразок коректного введення:</strong> 1234</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="postcode">Поштовий індекс Македонії:</label>
    <input type="text" id="postcode" name="postcode" required>
    <button type="submit">Перевірити</button>
</form>

</body>
</html>
