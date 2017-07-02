@extends('layouts.master')
@section('title')
| {{$player}} | {{$season}}
@endsection

@section('stylesheets')
<link href="{{ asset('css/theme.default.min.css')}}" rel="stylesheet">
@endsection
@section('content')
      <div class="container-fluid" role="main">
        <div class="page-header">
            <h2>{{$player}} - {{$playerPosition}}</h2>

            <h4>{{$season}}</h4>
            <h4>
            @foreach($teamData as $player) 
              @if($player['Comp'] == "All")
                <a href="{{url('teams')}}/{{$player['Team']}}">{{$player['Team']}}</a> &nbsp;
              @endif
            @endforeach
            </h4>
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
              <div class="row">
                <div class="col-md-12">                  
                  <table class="table table-striped table-bordered table-condensed table-hover" id="puckiq">
                    <thead>
                      <tr>
                        <th data-sorter="false">Team</th>
                        <th data-sorter="false">Comp</th>
                        <th data-sorter="false">GT</th>
                        <th>TOI</th>
                        <th>CTOI%</th>
                        <th>CF</th>                        
                        <th>CA</th>                                                                        
                        <th>CF%</th>
                        <th>CF/60</th>
                        <th>CA/60</th>
                        <th>CF60RC</th>                        
                        <th>CA60RC</th>
                        <th>CF%RC</th>
                        <th>CF%RA</th>
                        <th>DFF</th>
                        <th>DFA</th>
                        <th>DFF%</th>                        
                        <th>DFF/60</th>                        
                        <th>DFA/60</th>
                        <th>DFF60RC</th>                       
                        <th>DFA60RC</th>
                        <th>DFF%RC</th>
                        <th>DFF%RA</th>
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
                        <td>{{$player['Team']}}</td>
                        <td>{{$player['Comp']}}</td>
  @if($player['Conf']=="Both")
                        <td>All</td>
  @else
                        <td>{{$player['Conf']}}</td>
  @endif
                        <td>{{number_format($player['TOI']/60,2)}}</td>
                        <td>{{number_format($player['CompTOI%'],2)}}</td>
                        <td>{{number_format($player['CF'],2)}}</td>
                        <td>{{number_format($player['CA'],2)}}</td>
                        <td>{{number_format($player['CF%'],2)}}</td>
                        <td>{{number_format($player['CF/60'],2)}}</td>
                        <td>{{number_format($player['CA/60'],2)}}</td>
                        <td>{{number_format($player['CF60RelComp'],2)}}</td>
                        <td>{{number_format($player['CA60RelComp'],2)}}</td>
                        <td>{{number_format($player['CF%RelComp'],2)}}</td>
                        <td>{{number_format($player['CF%RelAll'],2)}}</td>
                        <td>{{number_format($player['DFF'],2)}}</td>
                        <td>{{number_format($player['DFA'],2)}}</td>
                        <td>{{number_format($player['DFF%'],2)}}</td>
                        <td>{{number_format($player['DFF/60'],2)}}</td>
                        <td>{{number_format($player['DFA/60'],2)}}</td>
                        <td>{{number_format($player['DFF60RelComp'],2)}}</td>
                        <td>{{number_format($player['DFA60RelComp'],2)}}</td>
                        <td>{{number_format($player['DFF%RelComp'],2)}}</td>
                        <td>{{number_format($player['DFF%RelAll'],2)}}</td>
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