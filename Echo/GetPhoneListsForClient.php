<?php
class Echo_GetPhoneListsForClient {

	public function byClientId($clientId){
		$EchoRequest = new Echo_Request('getPhoneListsForClient');
		$EchoRequest->addParam('clientId', $clientId);
		$results = $EchoRequest->execute();
//		var_dump($EchoRequest);
		return $results;
	}

}
