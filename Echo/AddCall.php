<?php
abstract class Echo_AddCall {
	
	protected $recordingsArray = array();
	protected $type;
	protected $clientId;
	protected $name;
	protected $useDisclaimer = 0;
	protected $pressThroughDigit = 0;
	protected $agentPhoneNumber;
	
	public function __construct($name, $clientId){
		$this->name = $name;
		$this->clientId = $clientId;
	}
	
	protected function addRecording($key, $filename){
		if(!file_exists($filename)){
			throw new Exception ("File: $filename does not exist");
		}
		$info = new SplFileInfo($filename);
		$originalFilename = $info->getFilename();
		$fileContents = file_get_contents($filename);
		$encoded = base64_encode($fileContents);
		$this->recordingsArray[$key] = array(
			'contents' => $encoded,
			'originalFilename' => $originalFilename,
		);
	}
	
	public function setLiveMessage($filename){
		$this->addRecording('liveVoice', $filename);
	}
	
	public function setAMMessage($filename){
		$this->addRecording('answeringMachine', $filename);
	}
	
	public function setDisclaimerMessage($filename){
		$this->useDisclaimer = 1;
		$this->addRecording('disclaimer', $filename);
	}
	
	public function execute(){
		$EchoRequest = new Echo_Request('addCall');
		$EchoRequest->addParam('recordingArray', $this->recordingsArray);
		$EchoRequest->addParam('type', $this->type);
		$EchoRequest->addParam('clientId', $this->clientId);
		$EchoRequest->addParam('name', $this->name);
		$EchoRequest->addParam('useDisclaimer', $this->useDisclaimer);
		$EchoRequest->addParam('agentPhoneNumber', $this->agentPhoneNumber);
		$EchoRequest->addParam('pressThroughDigit', $this->pressThroughDigit);
		return $EchoRequest->execute();
	}
	
}
