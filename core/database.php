<?php
include 'config.php';

class Database {
	
	//Получить данные для подключения к БД:
	public function getDataConnect(){

		include 'core/database_connect.php';
		
		$result = [
					'host' => $host,
					'user' => $user,
					'password' => $password,
					'database' => $database
				];
				
		return $result;
	}
	
	//--Получение данных по запросу всей информации из БД:
	public function queryToDb($query) {
		
	$link = mysqli_connect("localhost", "root", "", "finClimb");
		//Выполняем запрос к БД - mysqli_query()
		//(!) $link только для процедурного стиля
		if ($result = mysqli_query($link, $query)) {

			$row = mysqli_fetch_assoc($result); //ассоц.массив с Log and Psw
			return $row;

			/* удаление выборки */
			//Освобождаем память, занятую результатом запроса.
			mysqli_free_result($result);
		}
		
		/* закрытие соединения */
		mysqli_close($link);	
	}
}
?>