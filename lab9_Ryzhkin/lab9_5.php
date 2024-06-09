<?php
require '../config.php';
require '../db.php';
$ln = substr(basename(__DIR__), 3, 1);
$taskN = substr(basename(__FILE__), -5, 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = mysqli_real_escape_string($db_server, $_POST['delete_id']);
    $query_delete_news = mysqli_query($db_server, "DELETE FROM popadynets_news WHERE id = '$delete_id'");

    if ($query_delete_news) {
        echo "Новина з ID $delete_id успішно видалена.";
    } else {
        echo "Помилка: " . mysqli_error($db_server);
    }
}

$query_select_news = mysqli_query($db_server, "SELECT id, theme, title, date FROM popadynets_news");
?>



<form method="post">
    <label for="delete_id">Введіть ID новини для видалення:</label><br>
    <input type="text" id="delete_id" name="delete_id"><br>
    <input type="submit" value="Видалити новину">
</form>




<table>
    <tr>
        <th>№</th>
        <th>Тема</th>
        <th>Заголовок</th>
        <th>Дата</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($query_select_news)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['theme']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['date']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php mysqli_close($db_server); ?>
