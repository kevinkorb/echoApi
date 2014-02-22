<?php
require_once('includes.php');

/**
 * Get All Dispositions
 */
echo "Get All Dispositions\n";
$Dispositions = new Echo_GetCallDispositionData();
$Dispositions->setLimit(50);
$Dispositions->setStart(0);
$response = $Dispositions->execute();
$returnObj = json_decode($response);
var_dump($returnObj);
