@extends('layouts.master')

@section('title', '')

@section('content')
      <div class="container-fluid" role="main">
        <div class="page-header">
            <div class="row">
              <div class="col-md-12">                  
                <table class="table table-striped table-bordered table-condensed table-hover" id="puckiq">
                  <thead>
                    <th colspan="2">Glossary</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>CA</td>
                      <td>Corsi Against. Any shot attempt towards the goal by the opposition.</td>
                    </tr>
                    <tr>
                      <td>CA/60</td>
                      <td>Corsi Against per 60 minutes of time on ice.</td>
                    </tr>
                    <tr>
                      <td>CA60RC</td>
                      <td>Corsi Against per 60 minutes of time on ice relative to the player’s team mates Corsi Against per 60 minutes of time on ice vs. the same level of competition when the player is not on the ice.</td>
                    </tr>
                    <tr>
                      <td>CF</td>
                      <td>Corsi For. Any shot attempt towards the opposition’s goal.</td>
                    </tr>
                    <tr>
                      <td>CF%</td>
                      <td>Corsi For Percentage. Ratio of Corsi For and Corsi Against.</td>
                    </tr>
                    <tr>
                      <td>CF%RA</td>
                      <td>Corsi For Percentage relative to the player’s team mates Corsi For Percentage vs. all levels of competition when the player is not on the ice.</td>
                    </tr>
                    <tr>
                      <td>CF%RC</td>
                      <td>Corsi For Percentage relative to the player’s team mates Corsi For Percentage vs. the same level of competition when the player is not on the ice.</td>
                    </tr>
                    <tr>
                      <td>CF/60</td>
                      <td>Corsi For per 60 minutes of time on ice.</td>
                    </tr>
                    <tr>
                      <td>CF60RC</td>
                      <td>Corsi For per 60 minutes of time on ice relative to the player’s team mates Corsi For per 60 minutes of time on ice vs. the same level of competition when the player is not on the ice.</td>
                    </tr>
                    <tr>
                      <td>Comp</td>
                      <td>Level of competition (forwards only). Will be one of Elite, Middle, Gritensity or All.</td>
                    </tr>
                    <tr>
                      <td>GT</td>
                      <td>Game Type. vs West, vs East, vs Playoff Teams, vs Non Playoff Teams, Home, Away or All</td>
                    </tr>
                    <tr>
                      <td>CTOI</td>
                      <td>Player’s overall time on ice (in minutes) spent playing against the specific level of competition.</td>
                    </tr>
                    <tr>
                      <td>CTOI%</td>
                      <td>Percentage of player’s overall time on ice spent playing against the specific level of competition.</td>
                    </tr>                    
                    <tr>
                      <td>Dangerous Fenwick</td>
                      <td>Weighted shot metric that takes into account the distance and type of unblocked shot at the net and applies the probability of that type of shot becoming a goal (based on 5 years of NHL shot/goal data. Works very similar to “Expected Goals”. (https://oilersnerdalert.wordpress.com/2015/10/30/explaining-dangerous- fenwick/)</td>
                    </tr>
                    <tr>
                      <td>DFA</td>
                      <td>Dangerous Fenwick Against.</td>
                    </tr>
                    <tr>
                      <td>DFA/60</td>
                      <td>Dangerous Fenwick Against per 60 minutes of time on ice.</td>
                    </tr>
                    <tr>
                      <td>DFA60RC</td>
                      <td>Dangerous Fenwick Against per 60 minutes of time on ice relative to the player’s team mates Dangerous Fenwick Against per 60 minutes of time on ice vs. the same level of competition when the player is not on the ice.</td>
                    </tr>
                    <tr>
                      <td>DFF</td>
                      <td>Dangerous Fenwick For.</td>
                    </tr>
                    <tr>
                      <td>DFF%</td>
                      <td>Dangerous Fenwick For and Against ratio.</td>
                    </tr>
                    <tr>
                      <td>DFF%RA</td>
                      <td>Dangerous Fenwick ratio relative to the player’s team mates’ Dangerous Fenwick ratio vs all levels of competition when the player is not on the ice.</td>
                    </tr>
                    <tr>
                      <td>DFF%RC</td>
                      <td>Dangerous Fenwick ratio relative to the player’s team mates’ Dangerous Fenwick ratio vs the same level of competition when the player is not on the ice.</td>
                    </tr>
                    <tr>
                      <td>DFF/60</td>
                      <td>Dangerous Fenwick For per 60 minutes of time on ice.</td>
                    </tr>
                    <tr>
                      <td>DFF60RC</td>
                      <td>Dangerous Fenwick For per 60 minutes of time on ice relative to the player’s team mates Dangerous Fenwick For per 60 minutes of time on ice vs. the same level of competition when the player is not on the ice.</td>
                    </tr>
                    <tr>
                      <td>Pos</td>
                      <td>Position the player plays</td>
                    </tr>
                    <tr>
                      <td>RA</td>
                      <td>Relative All. How the player’s results compare to his team mates’ results in that same metric vs all levels of competition when the player is off the ice.</td>
                    </tr>
                    <tr>
                      <td>RC</td>
                      <td>Relative Competition. How the player’s results compare to his team mates’ results in the same metric vs the same level of competition when the player is off the ice</td>
                    </tr>
                    <tr>
                      <td>TOI</td>
                      <td>Time on Ice. All data on this site is 5v5.</td>
                    </tr>
                  <tbody>
                </table>
              </div>
            </div>     
        </div>
      </div>
@stop