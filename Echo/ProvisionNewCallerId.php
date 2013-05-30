<?php

class Echo_ProvisionNewCallerId {
	
	protected $number;
	protected $clientId;
	protected $isTollFree;

	public function __construct($number, $clientId, $isTollFree){
		$this->number = $number;
		$this->clientId = $clientId;
		$this->isTollFree = $isTollFree;
	}

	public function execute(){
		$EchoRequest = new Echo_Request('ProvisionNewCallerId');
		$EchoRequest->addParam('number', $this->number);
		$EchoRequest->addParam('clientId', $this->clientId);
		$EchoRequest->addParam('isTollFree', $this->isTollFree);
		return $EchoRequest->execute();
	}

}
