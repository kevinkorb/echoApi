<?php
class Echo_AddSchedule {
	
	protected $callId;
	protected $callerId;
	protected $lists = array();
	protected $date;
	protected $timeZone;
	protected $redialTries = 0;
	protected $redialDelay = 'redialDelayNormal';
	protected $dialRateType = 1;
	protected $wirelessScrub;
	protected $dncScrubNational;
	protected $threshold;
	protected $startTimeAMPM;
	protected $endTimeAMPM;
	protected $startTimeMin;
	protected $endTimeMin;
	protected $startTimeHour;
	protected $endTimeHour;
	
	const DIAL_RATE_TYPE_FULL_SCHEDULED_TIME = 1;
	
	const REDIAL_DELAY_5_MIN = 'redialDelayShort';
	const REDIAL_DELAY_30_MIN = 'redialDelayNormal';
	const REDIAL_DELAY_60_MIN = 'redialDelayLong';

	public function __construct($callId){
		$this->callId = $callId;
	}
	
	public function addList($listId){
		$this->lists[] = $listId;
	}
	
	public function setCallScheduleDateAndTime($date, $startTimeMin, $startTimeHour, $startTimeAMPM, $endTimeMin, $endTimeHour, $endTimeAMPM, $timeZone){
		$this->date = $date;
		$this->startTimeMin = $startTimeMin;
		$this->startTimeHour = $startTimeHour;
		$this->startTimeAMPM = $startTimeAMPM;
		$this->endTimeMin = $endTimeMin;
		$this->endTimeHour = $endTimeHour;
		$this->endTimeAMPM = $endTimeAMPM;
		$this->timeZone = $timeZone;
	}
	
	public function setThreshold($threshold = 0){
		$this->threshold = $max;
	}
	
	public function setWirelessScrub($wirelessScrub = true){
		$this->wirelessScrub = $wirelessScrub;
	}
	
	public function setRedialTries($redialTries = 0){
		$this->redialTries = $redialTries;
	}
	
	public function setRedialDelay($redialDelay = null){
		$this->redialDelay = $redialDelay;
	}
	
	public function setCallerId($callerId){
		$this->callerId = $callerId;
	}
	
	public function setDialRateType($dialRateType){
		$this->dialRateType = $dialRateType;
	}
	
	public function setDncScrubNational($dncScrubNational = true){
		$this->dncScrubNational = $dncScrubNational;
	}
	
	public function execute(){
		
		$EchoRequest = new Echo_Request('addSchedule');
		$EchoRequest->addParam('callId', $this->callId);
		$EchoRequest->addParam('callerId', $this->callerId);
		$EchoRequest->addParam('lists', $this->lists);
		$EchoRequest->addParam('date', $this->date);
		$EchoRequest->addParam('timeZone', $this->timeZone);
		$EchoRequest->addParam('redialTries', $this->redialTries);
		$EchoRequest->addParam('redialDelay', $this->redialDelay);
		$EchoRequest->addParam('dialRateType', $this->dialRateType);
		$EchoRequest->addParam('wirelessScrub', $this->wirelessScrub);
		$EchoRequest->addParam('dncScrubNational', $this->dncScrubNational);
		$EchoRequest->addParam('threshold', $this->threshold);
		$EchoRequest->addParam('startTimeAMPM', $this->startTimeAMPM);
		$EchoRequest->addParam('endTimeAMPM', $this->endTimeAMPM);
		$EchoRequest->addParam('startTimeMin', $this->startTimeMin);
		$EchoRequest->addParam('endTimeMin', $this->endTimeMin);
		$EchoRequest->addParam('startTimeHour', $this->startTimeHour);
		$EchoRequest->addParam('endTimeHour', $this->endTimeHour);
		$EchoRequest->addParam('lists', $this->lists);

		return $EchoRequest->execute();
	}

	
	
}
