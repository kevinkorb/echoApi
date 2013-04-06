<?php
class Echo_Request {
	
	protected $endpoint;
	protected $params = array();
	
	public function __construct($endpoint){
		$this->endpoint = $endpoint;
	}
	
	public function addParam($name, $value){
		$this->params[$name] = $value;
	}
	
	public function execute(){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->getUrl());
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, 'data=' . json_encode($this->params));
		curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-ECHO-USERNAME: ' . ECHO_API_USERNAME, 'X-ECHO-API-KEY: ' . ECHO_API_KEY));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
	
	protected function getUrl(){
		$url = ECHO_API_BASEURL . "/apiV1/{$this->endpoint}";
		return $url;
	}
	
}
