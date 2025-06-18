<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fit";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed:" .
    $conn->connect_error);
}
$login = $_POST['login'];
$pass1 = $_POST['pass1'];

$sql = "SELECT * FROM fi WHERE login = '$login' AND pass1 = '$pass1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Успешно!";
    $_SESSION['id'] = $id;
    $_SESSION['login'] = $login;
    

    header('Location: message.php');
} else {
    echo "Нет такого пользователя!";
}
$conn->close();

?>