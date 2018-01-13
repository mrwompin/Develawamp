<?php 
spl_autoload_register(function($class_name) {
		include 'mod/' . $class_name . '.php';
});
