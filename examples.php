<?php
require_once('config.php');

function autoload($class){
	$class_patch = str_replace('_', DIRECTORY_SEPARATOR, $class);
	require_once($class_patch.".php");
}

spl_autoload_register('autoload');

/**
 * Get All Clients That Are Active
 */
$GetClients = new Echo_GetClients();
$results = $GetClients->all();
var_dump($results);


/**
 * Add A Client
 */
$AddClient = new Echo_AddClient();
$AddClient->setName('New Awesome Client');
$Response = $AddClient->execute();
var_dump($Response);

/**
 * Add A List
 */
$AddList = new Echo_AddList('New List From API', Echo_AddList::TYPE_TARGET, 13);
$AddList->addNumber(5555555555);
$AddList->addNumber(6666666666);
$AddList->addNumber(2172571202);
$response = $AddList->execute();
var_dump($response);
