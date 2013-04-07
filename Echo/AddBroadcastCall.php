<?php
class Echo_AddBroadcastCall extends Echo_AddCall {
		
	const TYPE_LIVE_VOICE_AND_AM_SAME_MESSAGE = 65;
	const TYPE_LIVE_VOICE_AND_AM_DIFFERENT_MESSAGE = 1;
	const TYPE_LIVE_VOICE_ONLY = 11;
	const TYPE_ANSWERING_MACHINE_ONLY = 55;
	
	protected $type = 65;
	
	public function setCallTypeLiveVoiceAndAMSameMessage($liveVoiceFile){
		$this->type = self::TYPE_LIVE_VOICE_AND_AM_SAME_MESSAGE;
		$this->setLiveMessage($liveVoiceFile);
	}
	
	public function setCallTypeLiveVoiceAndAMDifferentMessage($liveVoiceFile, $amVoiceFile){
		$this->type = self::TYPE_LIVE_VOICE_AND_AM_DIFFERENT_MESSAGE;
		$this->setLiveMessage($liveVoiceFile);
		$this->setAMMessage($amVoiceFile);
	}
	
	public function setCallTypeLiveVoiceOnly($liveVoiceFile){
		$this->type = self::TYPE_LIVE_VOICE_ONLY;
		$this->setLiveMessage($liveVoiceFile);
	}
	
	public function setCallTypeAMOnly($amVoiceFile){
		$this->type = self::TYPE_ANSWERING_MACHINE_ONLY;
		$this->setAMMessage($amVoiceFile);
	}
	
}
