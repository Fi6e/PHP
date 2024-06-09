<?php
    require '../config.php';
    require '../db.php';
 //mysqli_query($db_server, "drop table user");

    mysqli_query($db_server, "CREATE TABLE IF NOT EXISTS user(id INTEGER PRIMARY KEY AUTO_INCREMENT, 
        name VARCHAR(250), login VARCHAR(250) UNIQUE, password VARCHAR(100))");

    if(isset($_POST["name"], $_POST["login"], $_POST["password"])){
        $name = $_POST["name"];
        $login = $_POST["login"];
        $password = $_POST["password"];

try {
$result=mysqli_query($db_server, "INSERT INTO user(name, login, password) VALUES ('$name', '$login', '$password')");
 } catch (\Throwable $e) {
    echo "This was caught: " . $e->getMessage();
}
if($result){
            echo "<p>User successfully added!</p>";
        }
    }
?>
<html>
    <head> <title>LAB DB - TASK 4</title></head>
    <style>
        form{
            width: 250px;
            margin : 0 auto;
            display: flex;
            flex-direction: column;
        }

        table{margin: 1em;}
    </style>
    <body>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="Введіть ваше ім'я:" required>
            <input type="text" name="login" placeholder="Введіть ваш логін:" required>
            <input type="password" name="password" placeholder="Введіть ваш пароль" required>
            <input type="submit" value="Зареєструватися">
        </form>

        <table border="2">
            <tr><th>ID</th><th>Логін</th><th>Ім'я</th><th>Пароль</th></tr>

            <?php
            //  $query_res1 = mysqli_query($db_server, "delete from user where id='3'");

                $query_res = mysqli_query($db_server, "select * from user order by id");
    
                if (mysqli_num_rows($query_res) > 0) {
                    while($row = mysqli_fetch_assoc($query_res)) {
                        echo "<tr><td>".$row["id"]."</td><td>".$row["login"]."</td><td>".$row["name"]."</td><td>".$row["password"]."</td></tr>";
                    }
                } else {
                    echo "0 results";
                }                
                    mysqli_close($db_server);   
            ?>
        </table>
    </body>
</html>