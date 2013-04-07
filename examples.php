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
echo "Get All Clients\n";
$GetClients = new Echo_GetClients();
$response = $GetClients->all();
$returnObj = json_decode($response);
var_dump($returnObj);


// die();
/**
 * Add A Client
 */
 echo "\n\n\nAdd A Client\n";
$AddClient = new Echo_AddClient('New Awesome Client');
$response = $AddClient->execute();
$returnObj = json_decode($response);
var_dump($returnObj);
$ClientData = json_decode($returnObj->data);

/**
 * Add A List
 */
  echo "\n\n\nAdd A List\n";
$AddList = new Echo_AddList('New List From API', Echo_AddList::TYPE_TARGET, $ClientData->id);
$AddList->addNumber(5555555555);
$AddList->addNumber(6666666666);
$response = $AddList->execute();

$returnObj = json_decode($response);
var_dump($returnObj);

/**
 * Create a new Broadcast Call
 */
 echo "\n\n\nAdd A New Call\n";
 $AddCall = new Echo_AddBroadcastCall('Test call from API', $ClientData->id);
 $AddCall->setCallTypeLiveVoiceAndAMSameMessage('recordings/chainsaw.wav');
 $addCallResponse = $AddCall->execute();
 $AddCallJson = json_decode($addCallResponse);
 print_r($AddCallJson);
 
