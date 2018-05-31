<?php
error_reporting( E_ERROR ); 

define('TEMPLATE_PATH' , './asset/tpl/');

//Включаем и выполняем файл app.php
include "./core/app.php";

App::run();



?>