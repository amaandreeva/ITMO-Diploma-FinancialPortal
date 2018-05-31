<?php

class Controller {
    
    public function index() {
        
        $view = new View();        

        
        
        $view->renderMainPage($result);
                      
    }
    
    public function finPortal() {
        
        $view = new View();
        $view->renderFinPortal();
                      
    }
    
    public function disclosure() {
            
        $mdl = new Model();
        $result = $mdl->getDisclosure(); 
        
        echo $result;
    }
    
    public function statements() {
        
            
        $view = new View();
        $result=$view->renderStatements();
            
        echo $result;
    }
    
    public function news() {
            
        $mdl = new Model();
        $result = $mdl->getNews(); 
        
        echo $result;
    }    
    
    public function overView() {
       
        $mdl = new Model();
        $result = $mdl->getOverView(); 
        
        echo $result;

    }  
    
    public function graph(){
        $mdl = new Model();
        $result = $mdl->getGraph(); 
        
        echo $result;
        
    } 
    
    public function bar(){
        $mdl = new Model();
        $result = $mdl->getBar(); 
        
        echo $result;
        
    }  
    
    public function bankPosition() {
        
        $mdl = new Model();
        $result = $mdl->getBankPosition(); 
        
        echo $result;
        
    }  
    
};
?>