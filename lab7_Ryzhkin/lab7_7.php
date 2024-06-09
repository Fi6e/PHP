<!DOCTYPE html>
<html>
<head>
    <title>Користувацька інформація</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto; /* Center the container */
            text-align: center; /* Center the text within the container */
        }
        form {
            text-align: left; /* Reset text alignment for form elements */
        }
    </style>
</head>
<body>
    <?php
    require("../config.php");
    
    class User {
        public $surname;
        public $name;
        public $age;
        public $email;

        public function setUserData($surname, $name, $age, $email) {
            $this->surname = $surname;
            $this->name = $name;
            $this->age = $age;
            $this->email = $email;
        }

        public function displayUserData() {
            echo "<p><strong>Прізвище:</strong> {$this->surname}</p>";
            echo "<p><strong>Ім'я:</strong> {$this->name}</p>";
            echo "<p><strong>Вік:</strong> {$this->age}</p>";
            echo "<p><strong>Пошта:</strong> {$this->email}</p>";
        }
    }

    echo "<h2><b>Користувацька інформація:</b></h2>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['surname']) && isset($_POST['name']) && isset($_POST['age']) && isset($_POST['email'])) {
            $surname = $_POST['surname'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $email = $_POST['email'];

            $user = new User();
            $user->setUserData($surname, $name, $age, $email);
            $user->displayUserData();
        } else {
            echo "All fields are required!";
        }
    }
    ?>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="surname">Прізвище:</label><br>
            <input type="text" id="surname" name="surname" required><br>
            <label for="name">Ім'я:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="age">Вік:</label><br>
            <input type="number" id="age" name="age" required><br>
            <label for="email">Пошта:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
