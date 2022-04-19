<?php
    $login = filter_var($_POST['login'], //присваивание переменным login и password значений из формы в index.php при помощи id
    FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'],
    FILTER_SANITIZE_STRING);

    $link = new mysqli("localhost", "root", "root", "test_db"); //подключение к бд
    $link->query("INSERT INTO `userlist` (`user`, `pass`) VALUES('$login', '$password')"); //ввод данных из текстовых полей index.php в таблицу бд

    $link->close();
    header('location: index.php') //перевод обратно на index.php
?>