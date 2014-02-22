<?php

class Echo_GetCallDispositionData {

	protected $start = 0;
	protected $limit = 10000; //Max is 10000

	public function setStart($start){
		$this->start = $start;
	}

	public function setLimit($limit){
		$this->limit = $limit;
	}

	public function execute(){
		$EchoRequest = new Echo_Request('Dispositions');
		$EchoRequest->addParam('start', $this->start);
		$EchoRequest->addParam('limit', $this->limit);
		return $EchoRequest->execute();
	}

}
