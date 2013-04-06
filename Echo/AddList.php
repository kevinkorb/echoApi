<?php
class Echo_AddList {
	
	const TYPE_TARGET = 1;
	const TYPE_SUPPRESSION = 2;
	
	protected $name;
	protected $type;
	protected $clientId;
	protected $numbers = array();
	
	public function __construct($name, $type, $clientId){
		$this->name = $name;
		$this->type = $type;
		$this->clientId = $clientId;
	}
	
	public function addNumber($number, $externalId = null, $firstName = null, $lastName = null, $age = null, $sex = null, $race = null, $patchTo = null, $extra1 = null, $extra2 = null, $extra3 = null, $extra4 = null, $extra5 = null)
	{
		$this->numbers[] = array(
			'number' => $number,
			'externalId' => $externalId,
			'firstName' => $firstName,
			'lastName' => $lastName,
			'age' => $age,
			'sex' => $sex,
			'race' => $race,
			'patchTo' => $patchTo,
			'extra1' => $extra1,
			'extra1' => $extra1,
			'extra1' => $extra1,
			'extra1' => $extra1,
			'extra1' => $extra1,
		);		
	}
	
	public function execute(){
		$EchoRequest = new Echo_Request('addList');
		$EchoRequest->addParam('name', $this->name);
		$EchoRequest->addParam('type', $this->type);
		$EchoRequest->addParam('clientId', $this->clientId);
		$EchoRequest->addParam('numbers', $this->numbers);
		return $EchoRequest->execute();
	}

	
	
}
