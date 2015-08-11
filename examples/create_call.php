<?php
require_once('includes.php');

/**
 * Get All Clients That Are Active
 */
echo "Get All Clients\n";
$GetClients = new Echo_GetClients();
$response = $GetClients->all();
//echo $response;
$returnObj = json_decode($response);
//var_dump($returnObj);

$singleObject = array_pop($returnObj->data);
$clientId = $singleObject->id;

$GetListsForClient = new Echo_GetPhoneListsForClient();
$lists = $GetListsForClient->byClientId($clientId);
var_dump($lists);
die();


/**
 * Get all Phone lists for clients
 */

die();

// die();
/**
 * Add A Client
 */
 echo "\n\n\nAdd A Client\n";
$AddClient = new Echo_AddClient('New Awesome Client');
$response = $AddClient->execute();
$returnObj = json_decode($response);
echo $response;
//var_dump($returnObj);
$ClientData = json_decode($returnObj->data);

/**
 * Add A List
 */
echo "\n\n\nAdd A List\n";
$AddList = new Echo_AddList('New List From API', Echo_AddList::TYPE_TARGET, $ClientData->id);
$AddList->addNumber(5555555555);
$AddList->addNumber(6666666666);
$response = $AddList->execute();

$listReturnObj = json_decode($response);
//var_dump($listReturnObj);

/**
 * Create a new Broadcast Call
 */
 echo "\n\n\nAdd A New Call\n";
 $AddCall = new Echo_AddBroadcastCall('Test call from API', $ClientData->id);
 $AddCall->setCallTypeLiveVoiceAndAMSameMessage('../recordings/chainsaw.wav');
 $addCallResponse = $AddCall->execute();
 $AddCallJson = json_decode($addCallResponse);
// print_r($AddCallJson);

 echo "\n\n\n Add Existing Caller ID Number\n\n\n";
 $AddCallerId = new Echo_AddExistingCallerId("2172227777", $ClientData->id);
 $result = $AddCallerId->execute();
 $AddCallerIdResult = json_decode($result);

//die("DONE");


 echo "\n\n\nCreate a new Schedule\n";

 $AddSchedule = new Echo_AddSchedule($AddCallJson->data->id);
 $AddSchedule->setCallScheduleDateAndTime(date("Y/m/d", time() + 86400), 0, 3, "PM", "45", 3, 'PM', 'CST');
 $AddSchedule->addList($listReturnObj->data->id);
 $AddSchedule->setCallerId($AddCallerIdResult->data->id);
 $return = $AddSchedule->execute();
// var_dump($return);
