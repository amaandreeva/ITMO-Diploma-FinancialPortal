<?php

spl_autoload_register(function ($class_name) {
    
    $directorys = [
            'backend/view/',
            'backend/model/',
            'backend/controller/',
            'core/'            
        ];
    
    foreach($directorys as $directory){
        if(file_exists($directory.$class_name . '.php')){
            require_once($directory.$class_name . '.php');
            return;
        }          
    };
    
    echo "Класс ".$class_name ." не найден.";
            
});

?>