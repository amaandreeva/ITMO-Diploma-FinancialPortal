<?php
    
class ControllerAdmin {
	
    public function openPageRegAuth() {
		if ( isset ($_SESSION['auth']) and $_SESSION['auth'] === true ){

			$this->index(); //показываем админку

		} else {
			//показываем форму авторизации
			$resultInfoAuth = $_SESSION['infoAuth'];
			$resultInfoReg = $_SESSION['infoLogin'];
			$resultInfoAboutReg = $_SESSION['infoAboutReg'];
			$view = new ViewAdmin();
			$view->renderFormEnterAuth($resultInfoAuth, $resultInfoReg, $resultInfoAboutReg);  
		} 
	}
    
	
        public function index() {
//        $mdl = new ModelAdmin();
        $view = new ViewAdmin();
//        $result = $mdl->getAllPages();
        $view->render($result, 'admin_blockNews.tpl');                 
    }
    
    
    public function verification() {
		$auth = new Auth();
		$auth->verific();	
    }
	
    public function regUser() {
		$auth = new Auth();
		$auth->registrUser();
    }
	
    public function del() {
        $mdl = new ModelAdmin();
        $mdl->delPage();
		
		$this->index();
    }
	
    public function openEdit() {

        $mdl = new ModelAdmin();
        $view = new ViewAdmin();
		$result = $mdl->openEditPage();
		$view->renderOpenForm($result, 'admin_formEditAdd.tpl');   
    }
	
    public function saveEdit() {
		
        $mdl = new ModelAdmin();
        $mdl->saveEditPage();
		
		$this->index(); 
    }
	
    public function openAdd() {
        $view = new ViewAdmin();
		$view->renderOpenForm($result, 'admin_formAddNew.tpl');   
    }
	
    public function saveAdd() {
        $mdl = new ModelAdmin();
        $mdl->addNewPage();
		
		$this->index();
    }
	
    public function endSession() {
		$auth = new Auth();
		$auth->logOut();
    }
	
}