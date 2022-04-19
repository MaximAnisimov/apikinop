<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	</style>	
</head>
<body>
	<form role="form" method="POST" action="register.php"> <!--при нажитии кнопки переводит на register.php-->
		<p>РЕГИСТРАЦИЯ</p>
		<input type="text" placeholder="логин" name="login" id="login" required>
		<br>
		<input type="text" placeholder="пароль" name="password" id="password" required>
		<button type="submit" name="submit" value="Upload">зарегестрировать</button>
		<hr>
	</form>
	<p>ТАБЛИЦА ПОЛЬЗОВАТЕЛЕЙ</p>
<?php
	$link = new mysqli("localhost", "root", "root");
	$sql = "CREATE DATABASE test_db";
	mysqli_query($link, $sql); //создание бд test_db

	$link = new mysqli("localhost", "root", "root", "test_db");
	$sql = "CREATE TABLE userlist ( 
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		user VARCHAR(30) NOT NULL,
		pass VARCHAR(30) NOT NULL
	)";
	$link->query($sql); // создание таблицы userlist со столбцами id, user, pass

	$link = new mysqli("localhost", "root", "root", "test_db"); //"хост", "логин", "пароль", "название бд" // по умолчанию "localhost", "root", "", "название бд"
	//создать запрос
	if ($link) {
		$sql = "SELECT * FROM userlist"; //userlist - таблица с тремя столбцами (id, user, pass) в бд test_db
		//Отобразить данные из БД на web-странице в виде таблицы
		if($result = $link->query($sql)) {
				echo "<table border=2>";
				echo "<tr>";
				echo "<td>№</td>";
				echo "<td>Пользователь</td>";
				echo "<td>Пароль</td>";
				echo "</tr>";
				foreach($result as $row) {//тут данные из таблицы в бд вносятся в таблицу на html страницу
				echo "<tr>";
				echo "<td>".$row["id"]."</td>";
				echo "<td>".$row["user"]."</td>";
				echo "<td>".$row["pass"]."</td>";
				echo "<td style='height:100px;'></td>"; 
				echo "</tr>"; 
				}
		}
			echo "</table> ";
	}
?> 	
</body>
</html>