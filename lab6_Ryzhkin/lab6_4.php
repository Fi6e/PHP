<!DOCTYPE html> 
<html lang="en"> 
<head> 


    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Форма</title> 
    <style> 
        .error { 
            color: red; 
            border: 2px solid red; 
        } 
         
        .centered-div { 
            display: flex; 
            justify-content: center; 
            align-items: center; 
        } 
 
        .content { 
            text-align: center; 
        } 
 
        .correct { 
            color: green; 
            border: 2px solid green; 
        } 
 
        .feedback { 
            color: red; 
        } 
 
        .feedback.correct { 
            color: green; 
        } 
    </style> 
</head> 
<body> 
<?php 
echo '
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
';
require("../config.php"); 
$nameErr = $surnameErr = $loginErr = $passwordErr = $confirmPasswordErr = $emailErr = ""; 
$name = $surname = $login = $password = $confirmPassword = $email = ""; 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = test_input($_POST["name"]); 
    $surname = test_input($_POST["surname"]); 
    $login = test_input($_POST["login"]); 
    $password = test_input($_POST["password"]); 
    $confirmPassword = test_input($_POST["confirmPassword"]); 
    $email = test_input($_POST["email"]); 
 
    if (!preg_match("/^[A-ZА-Я][a-zа-я]*$/u", $name)) { 
        $nameErr = "Ім'я повинно містити лише літери, з першою великою"; 
    } else { 
        $nameErr = "Correct"; 
        $nameClass = "correct"; 
    } 
 
    if (!preg_match("/^[A-ZА-Я][a-zа-я]*$/u", $surname)) { 
        $surnameErr = "Ім'я повинно містити лише літери, з першою великою"; 
    } else { 
        $surnameErr = "Correct"; 
        $surnameClass = "correct"; 
    } 
 
    if (!preg_match("/^[a-z]+$/", $login)) { 
        $loginErr = "Логін повинен містити тільки латинські малі літери"; 
    } else { 
        $loginErr = "Correct"; 
        $loginClass = "correct"; 
    } 

    if (strlen($password) < 6 || !preg_match("/[a-zA-Z]+/", $password) || !preg_match("/[0-9]+/", $password)) { 
        $passwordErr = "Пароль повинен містити принаймні 6 символів, з яких принаймні 1 літера і 1 цифра"; 
    } else { 
        $passwordErr = "Correct"; 
        $passwordClass = "correct"; 
    } 
    
 
    if ($password !== $confirmPassword) { 
        $confirmPasswordErr = "Паролі не співпадають"; 
    } else { 
        $confirmPasswordErr = "Correct"; 
        $confirmPasswordClass = "correct"; 
    } 
 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $emailErr = "Невірний формат електронної пошти"; 
    } else { 
        $emailErr = "Correct"; 
        $emailClass = "correct"; 
    } 
} 
 
function test_input($data) { 
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $data; 
} 
?> 
<h1 class="content">Форма Реєстрації</h1> 
<div class="centered-div"> 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
    Ім'я: <input type="text" name="name" value="<?php echo $name; ?>"> 
    <span class="feedback <?php echo $nameClass; ?>"><?php echo $nameErr; ?></span> 
    <br><br> 
    Прізвище: <input type="text" name="surname" value="<?php echo $surname; ?>"> 
    <span class="feedback <?php echo $surnameClass; ?>"><?php echo $surnameErr; ?></span> 
    <br><br> 
    Логін: <input type="text" name="login" value="<?php echo $login; ?>"> 
    <span class="feedback <?php echo $loginClass; ?>"><?php echo $loginErr; ?></span> 
    <br><br> 
    Пароль: <input type="password" name="password" value="<?php echo $password; ?>"> 
    <span class="feedback <?php echo $passwordClass; ?>"><?php echo $passwordErr; ?></span> 
    <br><br> 
    Повторіть пароль: <input type="password" name="confirmPassword" value="<?php echo $confirmPassword; ?>"> 
    <span class="feedback <?php echo $confirmPasswordClass; ?>"><?php echo $confirmPasswordErr; ?></span> 
    <br><br> 
    E-mail: <input type="text" name="email" value="<?php echo $email; ?>"> 
    <span class="feedback <?php echo $emailClass; ?>"><?php echo $emailErr; ?></span>

    <br><br> 
    <input type="submit" name="submit" value="Submit"> 
</form> 
</div> 
</body> 
</html>