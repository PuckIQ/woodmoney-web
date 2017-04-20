$(document).ready(function(){
  $("#gameType").html('<option value="All">All</option>');  
  $("#competition").val("All");
  $("#gameType").val("All");
  
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
      $("#gameType").html('<option value="Both">All</option><option value="West">vs West</option><option value="East">vs East</option><option value="Home">Home</option><option value="Away">Away</option>');
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
    updateTable(parseData,competition,gameType,positions.get(),playerURL); 
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
    updateTable(parseData,$("#compSelect").val(),$("#confSelect").val(),positions.get(),playerURL); 
  });
});

function updateTable(parseData,competition,gameType,positions,playerURL){
  var htmlTable = "";
  $.each(parseData,function(key,value){
    if(value.Conf == gameType && value.Comp == competition && $.inArray(value.Pos,positions)!== -1){
      var conference = value.Conf;
      if(value.Conf=="Both"){
        conference = "All";
      }
      htmlTable += '<tr><td style="white-space: nowrap;"><a href="'+playerURL+'/'+value['PlayerId']+'">'+value['Player']+'</a></td><td>'+value['Pos']+'</td><td>'+value['Comp']+'</td><td>'+conference+'</td><td>'+Number(value['TOI']/60).toFixed(2)+'</td><td>'+Number(value['CompTOI%']).toFixed(2)+'</td><td>'+value['CF']+'</td><td>'+value['CA']+'</td><td>'+Number(value['CF%']).toFixed(2)+'</td><td>'+Number(value['CF/60']).toFixed(2)+'</td><td>'+Number(value['CA/60']).toFixed(2)+'</td><td>'+Number(value['CF60RelComp']).toFixed(2)+'</td><td>'+Number(value['CA60RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelAll']).toFixed(2)+'</td><td>'+Number(value['DFF']).toFixed(2)+'</td><td>'+Number(value['DFA']).toFixed(2)+'</td><td>'+Number(value['DFF%']).toFixed(2)+'</td><td>'+Number(value['DFF/60']).toFixed(2)+'</td><td>'+Number(value['DFA/60']).toFixed(2)+'</td><td>'+Number(value['DFF60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFA60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelAll']).toFixed(2)+'</td></tr>';
      //htmlTable += '<tr><td style="white-space: nowrap;">'+value.Player+'</a></td></tr>';
    }
  });
  $("#dataTable").html("<table>"+htmlTable+"</table>");
  var resort = true;
  $("table").trigger("update", [resort]);
}
