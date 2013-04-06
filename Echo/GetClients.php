<?php
class Echo_GetClients {
	
	public function all(){
		$EchoRequest = new Echo_Request('getAllClients');
		return $EchoRequest->execute();
	}
	
}
