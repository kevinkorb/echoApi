<?php
require_once('includes.php');

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
$AddList->addNumber(2172571202);
$response = $AddList->execute();

$listReturnObj = json_decode($response);
var_dump($listReturnObj);

/**
 * Create a new Broadcast Call
 */
 echo "\n\n\nAdd A New Call\n";
 $AddCall = new Echo_AddSimpleSurveyCall('Test survey from API', $ClientData->id);
 $AddCall->setCallTypeSurveyNoAM('../recordings/chainsaw.wav');
 $AddCall->setDisclaimerMessage('../recordings/chainsaw.wav');
 $AddCall->setInvalidMessage('../recordings/chainsaw.wav');
 $AddCall->addQuestion('../recordings/Question 1.m4a', 'Q1', array(
 	'1' => 'Yes',
 	'2' => 'No',
 ));
  $AddCall->addQuestion('../recordings/Question 2.m4a', 'Q2', array(
 	'1' => 'Yes',
 	'2' => 'No',
 ));
 $addCallResponse = $AddCall->execute();


 $AddCallJson = json_decode($addCallResponse);
 print_r($AddCallJson);
 
 echo "\n\n\n Add Existing Caller ID Number\n\n\n";
 $AddCallerId = new Echo_AddExistingCallerId("2172227777", $ClientData->id);
 $result = $AddCallerId->execute();

// var_dump($result);

 $AddCallerIdResult = json_decode($result);

 
 echo "\n\n\nCreate a new Schedule\n";
 $AddSchedule = new Echo_AddSchedule($AddCallJson->data->id);
 $AddSchedule->setCallScheduleDateAndTime(date("Y/m/d", time() + 86400), 0, 3, "PM", "15", 3, 'PM', 'CST');
 $AddSchedule->addList($listReturnObj->data->id);
 $AddSchedule->setCallerId($AddCallerIdResult->data->id);
 $return = $AddSchedule->execute();
 var_dump($return);
