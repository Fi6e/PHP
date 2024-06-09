<?php
require("../config.php");
?>
<html>
<head>
<title>Приклад операторів if, elseif, else</title>
</head>
<body>
<?php 
if (!empty($_POST["number"])) {
  $number = $_POST['number'];
  if ($number > 0) {
    echo "<div>Число ".$number." - додатнє</div>";
  } elseif ($number < 0) {
    echo "<div>Число ".$number." - від'ємне</div>";
  } elseif($number = 0) {
    echo "<div>Число ".$number." - дорівнює нулю</div>";
  }
}

echo "<br><div> Перевірка числа (додатнє, від'ємне або нуль)<br>
<form action='if.php' method='post'>
Введіть число:<br>
<input type='text' name='number'><br>
<input type='submit' value='Перевірити'>
</form>
</div>";
?>
</body>
</html>
