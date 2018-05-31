<?php
    
    include "autoloader.php";
    
    class App {
        
        public static function run() {
            
            $controller = $_GET['controller'];
            $action = $_GET['action'];

            if($controller == null){
                $controller = 'Controller';
                $action = 'index';
            };

            $ctr = new $controller();

            $ctr->$action();

        }   
    };

?>