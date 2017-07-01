<?php

namespace App\Http\Controllers\PuckIQAPI;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class WowyController extends Controller
{

	public static function run($player){

		$season = '2016-17';

		if (\App::environment('production'))
			$url = 'http://api.puckiq.com/wowy-player/'.$player;
		else
			$url = 'http://api.puckiq.com/wowy-player/'.$player;		

		$teamData = json_decode(self::APIConnect($url),true);
		
		echo json_encode($teamData);

		/*
		$playerName = $teamData[0]['Player'];

		switch($teamData[0]['Pos']){
			case "R":
				$playerPosition = "RW";
				break;
			case "L":
				$playerPosition = "LW";
				break;
			default:
				$playerPosition = $teamData[0]['Pos'];
				break;
		}


		return \View::make('pages.players')
					->with('player',$playerName)
					->with('playerPosition',$playerPosition)
					->with('season',$season)
					->with('teamData',$teamData,true);
					*/
	}


	private static function APIConnect($url){
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', $url);
		//echo $res->getStatusCode();
		// 200
		//echo $res->getHeaderLine('content-type');
		// 'application/json; charset=utf8'
		return $res->getBody();
		// '{"id": 1420053, "name": "guzzle", ...}'
	}
}