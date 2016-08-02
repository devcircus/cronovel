<?php

namespace DevCircus\Cronovel;

use \GuzzleHttp\Client;

class Cronovel 
{
	public $client;
	private $token;

	public function __construct(Client $client, $token)
	{
		$this->client = $client;
		$this->token = $token;
	}

	public function getEvents()
	{
		$response = $this->client->request('GET', 'events', [
		    'query' => [
		    	'tzid' => 'America/Chicago'
		    ],
		    'headers' => [
		    	'Authorization' => 'Bearer ' . $this->token
		    ]
		]);

		return $response->getBody()->getContents();
	}
}