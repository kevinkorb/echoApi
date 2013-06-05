<?php
class Echo_AddSimpleSurveyCall extends Echo_AddCall {
		
	const TYPE_SURVEY 						= 10;
	const TYPE_NO_AM						= 100;
	
	protected $type = 10;
	protected $questionsArray = array();
	
	public function setCallTypeSurvey($liveVoiceFile, $amVoiceFile){
		$this->type = self::TYPE_SURVEY;
		$this->setLiveMessage($liveVoiceFile);
		$this->setAMMessage($amVoiceFile);
	}
	
	public function setCallTypeSurveyNoAM($liveVoiceFile){
		$this->type = self::TYPE_NO_AM;
		$this->setLiveMessage($liveVoiceFile);
	}
	
	public function addQuestion($filename, $questionKey, $answersArray){
		if(!file_exists($filename)){
			throw new Exception ("File: $filename does not exist");
		}
		$this->validateAnswersArray($answersArray);
		$info = new SplFileInfo($filename);
		$originalFilename = $info->getFilename();
		$fileContents = file_get_contents($filename);
		$encoded = base64_encode($fileContents);
		$this->questionsArray[] = array(
			'contents' => $encoded,
			'originalFilename' => $originalFilename,
			'questionKey' => $questionKey,
			'answersArray' => $answersArray,
		);
	}
	
	protected function validateAnswersArray($answersArray){
		if(count($answersArray) == 0){
			throw new Exception("You must provide at least one valid answer");
		}
		foreach($answersArray AS $answerKey => $answerValue){
			if(!in_array($answerKey, array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9"))){
				throw new Exception("AnswerKey {$answerKey} is not valid");
			}
		}
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
		$EchoRequest->addParam('questionsArray', $this->questionsArray);
		return $EchoRequest->execute();
	}
	
}
