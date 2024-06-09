
<?php
require("../config.php");
include_once 'function.php';

echo "<h2>Завдання 5.1 Функція, що виводить заданий масив чисел разом із індексами в заданому і оберненому порядку. Задану послідовність вказати при виклику функції.
</h2>";
print_array(array(1, 2, 3, 4, 5));
echo "<hr><h2>Завдання 5.2</h2>";
$a = 19;
$N = ($a%10+1)*2;

$matrix = array();
for ($i = 0; $i < $N; $i++) {
    $row = array();
    for ($j = 0; $j < $N; $j++) {
        $row[] = random_int(1,100);
    }
    $matrix[] = $row;
}

print_array_as_table($matrix);


?>
