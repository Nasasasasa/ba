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
    $pol = $_POST['pol'];
    $message = $_POST['message'];

    $sql = "INSERT INTO sa (name, login, pol, message) VALUES ('$name', '$login', '$pol', '$message')";

        if ($conn->query($sql) === TRUE) {
            header('Location: index.html');
            exit;
        } else {
            echo "Ошибка" . $sql . "<br>" . $conn->error;
        }

        }

$conn->close();
?>