@extends('layouts.master')
@section('title')
| {{$player1['Name']}} and {{$player2['Name']}} - WOWY | {{$season}}
@endsection

@section('stylesheets')
<link href="{{ asset('css/theme.default.min.css')}}" rel="stylesheet">
@endsection
@section('content')
      <div class="container-fluid" role="main">
        <div class="page-header">
            <h2>WOWY - <a href="{{url('players')}}/{{$player1['ID']}}">{{$player1['Name']}} ({{$player1['Position']}})</a> and <a href="{{url('players')}}/{{$player2['ID']}}">{{$player2['Name']}} ({{$player2['Position']}})</a></h2>

            <h4>{{$season}}</h4>
            <h4>
            <h4>
                <a href="{{url('teams')}}/{{$team}}">{{$team}}</a> &nbsp;
            </h4>
            </h4>
            <?php /*
            <div class="row">
                <div class="col-md-6">
                Competition : 
                <select name="competition" id="competition">
                  <option value="All">All</option>
                  <option value="Elite">Elite</option>
                  <option value="Middle">Middle</option>
                  <option value="Gritensity">Gritensity</option>
                </select>
                Game Type :
                <select name="gameType" id="gameType">
                  <option value="All">All</option>
                </select>
                <button type="button" class="btn btn-xs btn-success" id="CompSelectSubmit"><strong>Go</strong></button>
                </div>
            </div>
            */ ?>
              <div class="row">
                <div class="col-md-12">                  
                  <table class="table table-striped table-bordered table-condensed table-hover" id="puckiq">
                    <thead>
                      <tr>
                        <th>Players</th>
                        <th>TOI</th>
                        <th>CF</th>                        
                        <th>CA</th>                                                                        
                        <th>CF%</th>
                        <th>CF/60</th>
                        <th>CA/60</th>
                        <th>DFF</th>
                        <th>DFA</th>
                        <th>DFF%</th>                        
                        <th>DFF/60</th>                        
                        <th>DFA/60</th>
                        <th>GF</th>
                        <th>GA</th>
                        <th>GF%</th>
                        <th>GF/60</th>
                        <th>GA/60</th>
                      </tr>
                    </thead>
                    <tbody id="dataTable">
@foreach($teamData as $player)
                     <tr>
                        @if($player['RecordType']=='1 and 2')
                            <td>{{$player1['Name']}} w {{$player2['Name']}}</td>
                        @elseif($player['RecordType']=='1 not 2')
                            <td>{{$player1['Name']}} w/o {{$player2['Name']}}</td>
                        @else
                            <td>{{$player2['Name']}} w/o {{$player1['Name']}}</td>
                        @endif                        
                        <td>{{number_format($player['EVTOI']/60,2)}}</td>                        
                        <td>{{number_format($player['CF'],2)}}</td>
                        <td>{{number_format($player['CA'],2)}}</td>
                        <td>{{number_format($player['CF%'],2)}}</td>
                        <td>{{number_format($player['CF/60'],2)}}</td>
                        <td>{{number_format($player['CA/60'],2)}}</td>
                        <td>{{number_format($player['DFF'],2)}}</td>
                        <td>{{number_format($player['DFA'],2)}}</td>
                        <td>{{number_format($player['DFF%'],2)}}</td>
                        <td>{{number_format($player['DFF/60'],2)}}</td>
                        <td>{{number_format($player['DFA/60'],2)}}</td>
                        <td>{{(isset($player['GF']) ? $player['GF'] : "--")}}</td>
                        <td>{{(isset($player['GA']) ? $player['GA'] : "--")}}</td>
                        <td>{{(isset($player['GF%']) ? number_format($player['GF%'],2) : "--")}}</td>
                        <td>{{(isset($player['GF/60']) ? number_format($player['GF/60'],2) : "--")}}</td>
                        <td>{{(isset($player['GA/60']) ? number_format($player['GA/60'],2) : "--")}}</td>                                                               
                      </tr>                    
@endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
        <div id="test"></div>
@endsection

@section('javascript')
<script type="text/javascript">
var teamData = JSON.stringify("{{json_encode($teamData)}}");
</script>
<script src="{{ asset('js/tablesort.js')}}"></script>
<script src="{{ asset('js/widgets.js')}}"></script>
<script src="{{ asset('js/players.js')}}"></script> 
</script> 
@endsection