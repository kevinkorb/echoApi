<?php

class Echo_SearchForCallerId {
	
	protected $isTollFree = false;
	protected $contains;
	protected $areaCode;
	
	public function __construct($isTollFree = false){
		$this->isTollFree = $isTollFree;
	}
	
	public function setAreaCode($areaCode){
		$this->areaCode = $areaCode;
	}
	
	public function setContains($contains){
		$this->contains = $contains;
	}
	
	public function execute(){
		$EchoRequest = new Echo_Request('SearchForCallerId');
		$EchoRequest->addParam('isTollFree', $this->isTollFree);
		if(!empty($this->contains)){
			$EchoRequest->addParam('contains', $this->contains);
		}
		if(!empty($this->areaCode)){
			$EchoRequest->addParam('areaCode', $this->areaCode);
		}
		
		return $EchoRequest->execute();
	}

}
