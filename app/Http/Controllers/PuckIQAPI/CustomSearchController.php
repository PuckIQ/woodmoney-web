<?php

namespace App\Http\Controllers\PuckIQAPI;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class CustomSearchController extends Controller
{

	public static function run(){

		$season = '2016-17';

		return \View::make('pages.custom')
					->with('season',$season);
	}

	public static function search(){
		$season				 = $_POST['season'];
		$competition		 = $_POST['competition'];
		$position			 = $_POST['position'];
		$toi				 = $_POST['toi'];
		$extendUrl			 = "";

		if($position == "All"){
			if (\App::environment('production'))
				$url = 'http://api.puckiq.com/woodmoney-comp/comp/'.$competition;
			else
				$url = 'http://api.puckiq.com/woodmoney-comp/comp/'.$competition;

			$teamData = json_decode(self::APIConnect($url),true);
		}else{
			$teamData = array();
			$positions = explode(",", $position);
			foreach($positions as $pos){
				if (\App::environment('production'))
					$url = 'http://api.puckiq.com/woodmoney-comp/comp/'.$competition.'/gameType/2/pos/'.$pos;
				else
					$url = 'http://api.puckiq.com/woodmoney-comp/comp/'.$competition.'/gameType/2/pos/'.$pos;
				$teamData = array_merge($teamData,json_decode(self::APIConnect($url),true));
			}

		}



		
		//var_dump($teamData);
		echo json_encode($teamData);
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