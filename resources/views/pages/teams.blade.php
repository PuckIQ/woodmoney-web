@extends('layouts.master')
@section('title')
| {{$team}} | {{$season}}
@endsection

@section('stylesheets')
<link href="{{ asset('css/theme.default.min.css')}}" rel="stylesheet">
@endsection
@section('content')
      <div class="container-fluid" role="main">
        <div class="page-header">
            <h2>{{$team}}</h2>
            <h4>{{$season}}</h4>
            <div class="row">
                <div class="col-md-4">
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
                <div class="col-md-4 selector">      
                  <input type="hidden" id="compSelect" value="All">                
                  <input type="hidden" id="confSelect" value="All">            
                  Fowards <input type="checkbox" name="positions" value="F" checked="checked" style="margin-right:5px;" /> 
                  Centres <input type="checkbox" name="positions" value="C" checked="checked" style="margin-right:5px;"  /> 
                  LW <input type="checkbox" name="positions" value="L" checked="checked" style="margin-right:5px;"  /> 
                  RW <input type="checkbox" name="positions" value="R" checked="checked" style="margin-right:5px;" />
                  Defencemen <input type="checkbox" name="positions" value="D" checked="checked" /> 
                </div>
            </div>
              <div class="row">
                <div class="col-md-12">                  
                  <table class="table table-striped table-bordered table-condensed table-hover" id="puckiq">
                    <thead>
                      <tr>
                        <th>Player</th>
                        <th>Pos</th>
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
                      </tr>
                    </thead>
                    <tbody id="dataTable">
@foreach($teamData as $player)
  @if($player['Comp']=="All" && $player['Conf']=="All")
                      <tr>
                        <td style="white-space: nowrap;"><a href="{{url('players')}}/{{$player['PlayerId']}}">{{$player['Player']}}</a></td>
                        <td>{{$player['Pos']}}</td>
                        <td>{{$player['Comp']}}</td>
                        <td>{{$player['Conf']}}</td>
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
                      </tr>                    
  @endif
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

  var parseData = JSON.parse(teamData.replace(/&quot;/g,'"')); 

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
       
    var positions = $("input:checked").map(function(){
      return $(this).val();
    });
    $("#compSelect").val($("#competition").val());
    $("#confSelect").val($("#gameType").val());   
    updateTable(parseData,competition,gameType,positions.get()); 
  });

  $(".selector").children("input:checkbox").click(function(e){
    var position = $(this).val();
    if(position == "F"){
      if(this.checked){
        $("input:checkbox[value='C']").prop('checked', true);
        $("input:checkbox[value='R']").prop('checked', true);
        $("input:checkbox[value='L']").prop('checked', true);
      }else{
        $("input:checkbox[value='C']").prop('checked', false);
        $("input:checkbox[value='R']").prop('checked', false);
        $("input:checkbox[value='L']").prop('checked', false);
      }
    }

    if($("input:checkbox[value='C']").prop('checked') && $("input:checkbox[value='L']").prop('checked') && $("input:checkbox[value='R']").prop('checked')){
      $("input:checkbox[value='F']").prop('checked', true);
    }else{
      $("input:checkbox[value='F']").prop('checked', false);
    }

    var positions = $("input:checked").map(function(){
      if($(this).val()!=="F"){
        return $(this).val();
      }
    });
    console.log(positions.get());
    updateTable(parseData,$("#compSelect").val(),$("#confSelect").val(),positions.get()); 
  });
});

function updateTable(parseData,competition,gameType,positions){
  var htmlTable = "";
  $.each(parseData,function(key,value){
      //console.log(value.Pos);
        if(value.Conf == gameType && value.Comp == competition && $.inArray(value.Pos,positions)!== -1){
          var conference = value['Conf'];
          if(value['Conf']=="Both"){
            conference = "All";
          }
          htmlTable += '<tr><td style="white-space: nowrap;"><a href="{{url('players')}}/'+value['PlayerId']+'">'+value['Player']+'</a></td><td>'+value['Pos']+'</td><td>'+value['Comp']+'</td><td>'+conference+'</td><td>'+Number(value['TOI']/60).toFixed(2)+'</td><td>'+Number(value['CompTOI%']).toFixed(2)+'</td><td>'+value['CF']+'</td><td>'+value['CA']+'</td><td>'+Number(value['CF%']).toFixed(2)+'</td><td>'+Number(value['CF/60']).toFixed(2)+'</td><td>'+Number(value['CA/60']).toFixed(2)+'</td><td>'+Number(value['CF60RelComp']).toFixed(2)+'</td><td>'+Number(value['CA60RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelAll']).toFixed(2)+'</td><td>'+Number(value['DFF']).toFixed(2)+'</td><td>'+Number(value['DFA']).toFixed(2)+'</td><td>'+Number(value['DFF%']).toFixed(2)+'</td><td>'+Number(value['DFF/60']).toFixed(2)+'</td><td>'+Number(value['DFA/60']).toFixed(2)+'</td><td>'+Number(value['DFF60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFA60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelAll']).toFixed(2)+'</td></tr>';
        }
    });
    $("#dataTable").html("<table>"+htmlTable+"</table>");
    var resort = true;
    $("table").trigger("update", [resort]);
}
</script> 
@endsection