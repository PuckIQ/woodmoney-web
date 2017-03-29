<?php

namespace App\Http\Controllers\PuckIQAPI;

use App\Http\Controllers\Controller;

class ConnectionController extends Controller
{

	public static function run($url){

		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', $url);
		echo $res->getStatusCode();
		// 200
		echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		echo $res->getBody();
		// '{"id": 1420053, "name": "guzzle", ...}'
	}

}