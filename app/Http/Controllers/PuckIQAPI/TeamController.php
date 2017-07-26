<?php

namespace App\Http\Controllers\PuckIQAPI;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class TeamController extends Controller
{

	public static function run($team){

		$season = '2016-17';
		$url = 'http://api.puckiq.com/woodmoney-team/'.$team;
		$teamData = self::APIConnect($url);
		
		return \View::make('pages.teams')
					->with('team',$team)
					->with('season',$season)
					->with('teamData',json_decode($teamData,true));
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