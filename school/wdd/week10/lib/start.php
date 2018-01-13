<?php 
spl_autoload_register(function($class_name) {
		include 'lib/' . $class_name . '.php';
		//file_put_contents(strtolower( "mod/css/" . $class_name . ".css" ), "mod/css/week10.css", FILE_APPEND); //trying to autoload css
});
