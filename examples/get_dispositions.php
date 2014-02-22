<?php
require_once('includes.php');

/**
 * Get All Dispositions
 */
echo "Get All Clients\n";
$Dispositions = new Echo_GetCallDispositionData();
$Dispositions->setLimit(50);
$Dispositions->setStart(0);
$response = $Dispositions->execute();
echo $response;
$returnObj = json_decode($response);
var_dump($returnObj);
