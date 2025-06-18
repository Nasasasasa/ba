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
$user_name = $_SESSION['login'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $msg = $_POST['msg'];
    $pol = $_POST['pol'];
    

    $sql = "INSERT INTO sa (login, msg, pol ) VALUES ( '$user_name','$msg', '$pol' )";

        if ($conn->query($sql) === TRUE) {
            header('Location: index.html');
            exit;
        } else {
            echo "Ошибка" . $sql . "<br>" . $conn->error;
        }

        }

$conn->close();
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="bootstrap-5.3.3-dist/css/bootstrap.css.map" rel="stylesheet">
        <link href="bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
        <link href="style2.css" rel="stylesheet">
        <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.js.map" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <title>Продажа билетов</title>
        <link rel="icon" href="photo/17-posvetu-1.jpg">
    </head>
    <body>
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Панель навигации</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.html">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reg.html">Регистриция</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="auto.html">Авторизация</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="foot">
    <h2 class="flo1">Зарегестрироваться</h2>
    <form class="forma" method="post" action=""> 
    <?php 

    ?>
    <label class="flo"><?php echo "$user_name" ?></label>
        <label class="flo">message</label>
        <textarea class="flo2" name="msg" placeholder="Ваше сообщение"></textarea>
        <input type="radio" class="flo2" name="pol" value="1">Муж</input>
        <input type="radio" class="flo2" name="pol" value="2">Жен</input>
        <button>Зарегестрироваться</button>
    </form>
    <p class="we">Уже зарегестрированы?<a class="we1" href="auto.html">Войти</a></p> 
</div>
    </body>
</html>