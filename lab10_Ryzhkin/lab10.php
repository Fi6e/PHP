<?php
require '../config.php';
require '../db.php';

mysqli_query($db_server, "CREATE TABLE IF NOT EXISTS user_for_session (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL)
    ");

?>

<html>
<head>
    <title>lab10</title>
</head>
<body>
<a href="task1-2.php"><p>Завдання 1-2</p></a>
<a href="secret_info.php"><p>secret info</p></a>
<a href="register.php"><p>Register</p></a>
  

</body>
</html>
