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
            <?php //var_dump($teamData); ?>
            <div class="row">
                <div class="col-md-6">
                Opposition : 
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
                        <th data-sorter="false">Comp</th>
                        <th data-sorter="false">Conf</th>
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
                      </tr>
                    </thead>
                    <tbody id="dataTable">
@foreach($teamData as $player)
                      <tr>
                        <td>{{$player['Comp']}}</td>
  @if($player['Conf']=="Both")
                        <td>All</td>
  @else
                        <td>{{$player['Conf']}}</td>
  @endif
                        <td>{{$player['TOI']}}</td>
                        <td>{{number_format($player['CompTOI%']}}</td>
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
<script src="{{ asset('js/tablesort.js')}}"></script>
<script src="{{ asset('js/widgets.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#gameType").html('<option value="All">All</option>');  
  $("#competition").val("All");
  $("#gameType").val("All");

  var teamData = JSON.stringify("{{json_encode($teamData)}}");
  teamData = teamData.replace(/&quot;/g,'"');
  teamData = teamData.replace('"[','[');
  teamData = teamData.replace(']"',']');
  $("#puckiq").tablesorter({
    sortInitialOrder  : 'desc',
    widgets           : ['zebra', 'columns'],
  }); 

  $("#competition").on('change',function(){
    var competition = $(this).val();
    if(competition == 'All'){
      $("#gameType").html('<option value="All">All</option>');
    }else{
      $("#gameType").html('<option value="Both">All</option><option value="West">vs West</option><option value="East">vs East</option><option value="POTeam">vs Playoff Teams</option><option value="NPOTeam">vs Non Playoff Teams</option><option value="Home">Home</option><option value="Away">Away</option>');
    }
  });

  $("#CompSelectSubmit").click(function(e){
    var competition = $("#competition").val();
    var gameType = $("#gameType").val();
    var parseData = JSON.parse(teamData.replace(/&quot;/g,'"'));
    var htmlTable = "";
    $.each(parseData,function(key,value){
        if(value.Conf == gameType && value.Comp == competition){
          var conference = value['Conf'];
          if(value['Conf']=="Both"){
            conference = "All";
          }
          htmlTable += '<td>'+value['Comp']+'</td><td>'+conference+'</td><td>'+value['TOI']+'</td><td>'+value['CompTOI%']+'</td><td>'+value['CF']+'</td><td>'+value['CA']+'</td><td>'+value['CF%']+'</td><td>'+value['CF/60']+'</td><td>'+value['CA/60']+'</td><td>'+Number(value['CF60RelComp']).toFixed(2)+'</td><td>'+Number(value['CA60RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelAll']).toFixed(2)+'</td><td>'+value['DFF']+'</td><td>'+value['DFA']+'</td><td>'+value['DFF%']+'</td><td>'+value['DFF/60']+'</td><td>'+value['DFA/60']+'</td><td>'+Number(value['DFF60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFA60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelAll']).toFixed(2)+'</td></tr>';
        }
    });
    $("#dataTable").html("<table>"+htmlTable+"</table>");
    var resort = true;
      $("table").trigger("update", [resort]);
  });

});
</script> 
@endsection