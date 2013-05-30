<?php
class Echo_AddExistingCallerId {
	
	protected $number;
	protected $clientId;
	
	public function __construct($number, $clientId){
		$this->number = $number;
		$this->clientId = $clientId;
	}
	
	public function execute(){
		$EchoRequest = new Echo_Request('addExistingCallerId');
		$EchoRequest->addParam('number', $this->number);
		$EchoRequest->addParam('clientId', $this->clientId);
		return $EchoRequest->execute();
	}
	
}
