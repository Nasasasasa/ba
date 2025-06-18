<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed:" .
    $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $login = $_POST['login'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if ($pass1 = $pass2) {
        echo "Совпадение!";

        $sql = "SELECT * FROM fi WHERE login = '$login'";
        $result = $conn->query($sql);
        
        if ($conn->num_rows > 0) {
            echo "пользователь зарегестрирован!";
        } else {
            $sql = "INSERT INTO fi (name, login, tel, email, pass1, pass2) VALUES ('$name', '$login', '$tel', '$email', '$pass1', '$pass2')";

            if ($conn->query($sql) === TRUE) {
                header('Location: index.html');
                exit;
            } else {
                echo "Ошибка" . $sql . "<br>" . $conn->error;
            }

        }
    } else {
        echo "пароли не совпадают!";
    }
}
$conn->close();
?>