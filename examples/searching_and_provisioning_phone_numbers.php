<?php
include("includes.php");

//Search For local number with area code '314
echo "\n\n\nSearch For Numbers with the area code '314'\n\n\n";
$SearchForCallerId = new Echo_SearchForCallerId(false);
$SearchForCallerId->setAreaCode(314);
var_dump($SearchForCallerId->execute());


echo "\n\n\nSearch For Numbers containing '314'\n\n\n";
$SearchForCallerId = new Echo_SearchForCallerId(false);
$SearchForCallerId->setContains(314);
var_dump($SearchForCallerId->execute());


echo "\n\n\Provision First Number Back From Results of '314'\n\n\n";
$SearchForCallerId = new Echo_SearchForCallerId(false);
$SearchForCallerId->setContains(314);
$result = json_decode($SearchForCallerId->execute(), true);
$Data = $result['data'];
var_dump($Data);

echo "\n\n\nAdding A Client for phone numbers\n";
$AddClient = new Echo_AddClient('New client for phone number');
$response = $AddClient->execute();
$returnObj = json_decode($response);
var_dump($returnObj);

$ClientData = json_decode($returnObj->data);




die("Prematurely stopping script before action number provision is called");
$targetNumber = $Data[0]['number'];
$ProvisionCallerId = new Echo_ProvisionNewCallerId($targetNumber, $ClientData->id, false);
$Result = $ProvisionCallerId->execute();
var_dump($Result);



