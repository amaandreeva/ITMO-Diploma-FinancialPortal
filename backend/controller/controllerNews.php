<?php

class ControllerNews {
    
    public function news(){
        
        $mdl = new ModelNews();
        $result = $mdl->getNews();
        
    }
};
?>