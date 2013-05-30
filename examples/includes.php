<?php
require_once('../config.php');

function autoload($class){
	$class_patch = str_replace('_', DIRECTORY_SEPARATOR, $class);
	require_once("../" . $class_patch.".php");
}

spl_autoload_register('autoload');