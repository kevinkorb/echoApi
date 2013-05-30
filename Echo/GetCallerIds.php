<?php
class Echo_GetCallerIds {
	
	protected $clientId;
	
	public function __construct($clientId){
		$this->clientId = $clientId;
	}
	
	public function execute(){
		$EchoRequest = new Echo_Request('GetCallerIdsForClient');
		$EchoRequest->addParam('clientId', $this->clientId);
		return $EchoRequest->execute();
	}

}
