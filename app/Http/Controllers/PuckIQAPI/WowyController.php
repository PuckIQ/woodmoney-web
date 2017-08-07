<?php

namespace App\Http\Controllers\PuckIQAPI;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class WowyController extends Controller
{

	public static function run($defaultPlayer,$comparePlayer){

		$season = '2016-17';
		$url = 'http://api.puckiq.com/wowy-player/'.$defaultPlayer.'/playercomp/'.$comparePlayer;
		$teamData = json_decode(self::APIConnect($url),true);	

		foreach($teamData as $teamKey=>$team){
			if($team['season']!="20162017"){
				unset($teamData[$teamKey]);
			}
		}

		$teamData = array_values($teamData);

		$player1 = array("Name"=>$teamData[0]['player1info'][0]['firstName']." ".$teamData[0]['player1info'][0]['lastName'],"Position" => $teamData[0]['player1info'][0]['primaryPosition']['code'],"ID"=>$teamData[0]['player1info'][0]['_id']);
		$player2 = array("Name"=>$teamData[0]['player2info'][0]['firstName']." ".$teamData[0]['player2info'][0]['lastName'],"Position" => $teamData[0]['player2info'][0]['primaryPosition']['code'],"ID"=>$teamData[0]['player2info'][0]['_id']);
		$playerTeam = $teamData[0]['Team'];
		return \View::make('pages.wowy')
					->with('player1',$player1)
					->with('player2',$player2)
					->with('season',$season)
					->with('team',$playerTeam)
					->with('teamData',$teamData,true);
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