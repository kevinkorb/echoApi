<?php
class Echo_AddClient {
	
	protected $name;
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function execute(){
		$EchoRequest = new Echo_Request('addClient');
		$EchoRequest->addParam('name', $this->name);
		return $EchoRequest->execute();
	}
	
}
