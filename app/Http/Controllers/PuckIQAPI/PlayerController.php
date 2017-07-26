<?php

namespace App\Http\Controllers\PuckIQAPI;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class PlayerController extends Controller
{

	public static function run($player){

		$season = '2016-17';
		$url = 'http://api.puckiq.com/woodmoney-player/'.$player;		

		$teamData = json_decode(self::APIConnect($url),true);
		$playerName = $teamData[0]['Player'];
		$playerID = $teamData[0]['PlayerId'];

		$teammateURL = 'http://api.puckiq.com/woodmoney-team/'.$teamData[0]['Team'];
		$teammateData = json_decode(self::APIConnect($teammateURL),true);
		$teammateList = array();
		foreach($teammateData as $teammate){
			if($teammate['Comp']=='Elite' && $teammate['Conf']=='Both' && $teammate['Player'] != $playerName){
				$teammateList[] = array($teammate['Player'],$teammate['PlayerId']);
			}
		}

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
					->with('playerID',$playerID)
					->with('playerPosition',$playerPosition)
					->with('season',$season)
					->with('teamList',$teammateList)
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