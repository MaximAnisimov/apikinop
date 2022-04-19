<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	</style>	
</head>
<body>
<?php
$link = new mysqli("localhost", "root", "root", "site_new");
//создать запрос
if ($link) {
	$sql = "SELECT * FROM userlist";
	//Отобразить данные из БД на web-странице в виде таблицы
	if($result = $link->query($sql)) {
			echo "<table border=2>";
			echo "<tr>";
			echo "<td>№</td>";
			echo "<td>Пользователь</td>";
			echo "<td>Пароль</td>";
			echo "</tr>";
	/*while (list($id,$user,$pass) = mysql_fetch_array($result))*/
			foreach($result as $row) {		
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