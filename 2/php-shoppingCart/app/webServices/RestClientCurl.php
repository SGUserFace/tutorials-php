<?php

class RestClientCurl{

	private $serviceUrl;

	private $client;

	// --------------------------------------------------------

	public function __construct($serviceUrl){

		$this->serviceUrl = $serviceUrl;	

		$this->setClient();	
	}

	// --------------------------------------------------------

	private function setClient(){

		$client	= curl_init($this->serviceUrl);

		if(!$client){

			return false;
		}

		$this->client = $client;
	}

	// --------------------------------------------------------
	
	public function get($params = []){

		if(!$this->client){

			return false;
		}

		curl_setopt_array($this->client, [
			CURLOPT_RETURNTRANSFER 	=> true,
		]);

		return $this->getResponse();		
	}

	// --------------------------------------------------------

	public function post($params = []){

		if(!$this->client){

			return false;
		}

		$postFields =[
			// TODO ... XML ... JSON ... TXT
		];

		curl_setopt_array($this->client, [
			CURLOPT_RETURNTRANSFER 	=> true,
			CURLOPT_POST 			=> true,
			CURLOPT_POSTFIELDS 		=> $postFields
		]);

		return $this->getResponse();	
	}

	// --------------------------------------------------------

	private function getResponse(){

		$response = curl_exec($this->client);

		if(!$response){

			return false;
		}

		if(!$this->validateResponse($response)){

			return false;
		}

		curl_close($this->client);	

		return $response;		
	}

	// --------------------------------------------------------

	private function validateResponse($response){

		// TODO

		return true;
	}

}