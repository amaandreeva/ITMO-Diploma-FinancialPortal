<?php

define('TEMPLATE_PATH' , "./asset/tpl/");

class ViewAdmin {
	
	public function renderFormEnterAuth ($resultInfoAuth, $resultInfoReg, $resultInfoAboutReg){
        
		include TEMPLATE_PATH."form_enter.tpl";
        
	}		
	
    
    public function render ($data, $name_tpl) {
		
		include TEMPLATE_PATH."admin_header.tpl";

		//Пагинатор:

		$cycle = $_GET['cycle']; //кол-во новостей на 1й странице
		$numbPagesStart = $_GET['start'];
		$numbPagesEnd = $_GET['end'];

		if($cycle == null){
			$cycle = 5;
		};

		if($numbPagesStart == null){
			$numbPagesStart = 0;
			$numbPagesEnd = $cycle - 1;
		};


		for($j = 0; $j < count($data); $j++){
			if($j >= $numbPagesStart and $j <= $numbPagesEnd){
				include TEMPLATE_PATH.$name_tpl;
			}
		};


		//Номера страниц
		echo "<div class='wrapper'><p> Страницы: ";
		
			$start = -$cycle;
			$end = -1;

			for($j = 1; $j <= ceil(count($data)/$cycle); $j++){
				$start += $cycle;
				$end += $cycle;
				echo "<span> | </span><a href='index.php?controller=ControllerAdmin&action=openPageRegAuth&start=".$start."&end=".$end."&cycle=".$cycle."'>".$j."</a><span> | </span>";
			};

		echo "</p></div>";
		
		include TEMPLATE_PATH."admin_footer.tpl";
    }
	
	public function renderOpenForm ($data, $name_tpl) {
		include TEMPLATE_PATH.$name_tpl;
	}

}




