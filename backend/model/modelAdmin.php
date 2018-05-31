<?php

class ModelAdmin {
	
	//Вывести все страницы:
	public function getAllPages(){
		
		$mdl = new Model();
		$result = $mdl->getAllPages();
		return $result;

	}
	
	//Удалить страницу:
	public function delPage(){
		$newsID = $_GET['newsID'];
		$lines = file('./asset/pages/pages.cvs' );
		$fileOpen = fopen('./asset/pages/pages.cvs', 'w+b');

		foreach($lines as $key => $value){

			$lines_expl = explode("#--#", $value);//разбиваем каждую строку на части, и записываем их в соответствующие значения ассоциативного массива.
			$id = $lines_expl[0];
			if($id !== $newsID){
				fwrite($fileOpen, $lines[$key]);
			}
		}
		fclose($fileOpen);
	}
	
	//Редактировать страницу:
	public function openEditPage(){
		
		$newsID = $_GET['newsID'];
		
		$lines = file('./asset/pages/pages.cvs' );

		foreach($lines as $key => $value){

			$lines_expl = explode("#--#", $value);//разбиваем каждую строку на части, и записываем их в соответствующие значения ассоциативного массива.
			$id = $lines_expl[0];
			
			if($id == $newsID){			
				$mass[] = [
						"id" => $lines_expl[0],
						"date" => $lines_expl[1],
						"header" => $lines_expl[2],
						"desc" => $lines_expl[3],
						"namePage" => $lines_expl[4]
				];

				return $mass;
				exit;
			}
		}
	}
	
	//Сохранить изменения :
	public function saveEditPage(){
		
		$newsID = $_GET['newsID'];
		$header = $_GET['header'];
		$desc = $_GET['desc'];
		$namePage = $_GET['namePage'];
		
		$lines = file('./asset/pages/pages.cvs' );
		$fileOpen = fopen('./asset/pages/pages.cvs', 'w+b');

		foreach($lines as $key => $value){

			$lines_expl = explode("#--#", $value);//разбиваем каждую строку на части, и записываем их в соответствующие значения ассоциативного массива.
			$id = $lines_expl[0];
			$date = $lines_expl[1];
			
			$lineModif = $id."#--#".$date."#--#".$header."#--#".$desc."#--#".$namePage."\n";

			if($id == $newsID){
				fwrite($fileOpen, $lineModif);
			} else {
				fwrite($fileOpen, $lines[$key]);
			}
		}
		fclose($fileOpen);		
		
	}
	
	//Добавить новую запись:
	public function addNewPage(){
	    //Чтобы при обновлении страница (ctrl+F5) запись не добавлялась повторно. Т.к. данные записи передаются через метод GET.
		header('Location: index.php?controller=ControllerAdmin&action=openPageRegAuth');
		
		//Создаем новый newsID, который будет на единицу больше, чем масимальный существующий id.
		$newsID = null;
	
		$lines = file('./asset/pages/pages.cvs' );

		$idArr = [];
		foreach($lines as $key => $value){

			$lines_expl = explode("#--#", $value);//разбиваем каждую строку на части, и записываем их в соответствующие значения ассоциативного массива.
			$id = $lines_expl[0];

			array_push($idArr, $id);
		}
		
		$idMax = max($idArr);
		
		$newsID = $idMax + 1;
		$date = date("Y.m.d H:i");
		$header = $_GET['header'];
		$desc = $_GET['desc'];
		$namePage = $_GET['namePage'];

		$lineModif = "\n".$newsID."#--#".$date."#--#".$header."#--#".$desc."#--#".$namePage;
		
		$fileContent = file_get_contents('./asset/pages/pages.cvs' );
		$fileContent .= $lineModif;
		file_put_contents('./asset/pages/pages.cvs', $fileContent);

	}
	
}