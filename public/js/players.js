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
    var parseData = JSON.parse(teamData.replace(/&quot;/g,'"'));
    var htmlTable = "";
    $.each(parseData,function(key,value){
        if(value.Conf == gameType && value.Comp == competition){
          var conference = value['Conf'];
          if(value['Conf']=="Both"){
            conference = "All";
          }
          htmlTable += '<td>'+value['Team']+'</td><td>'+value['Season']+'</td><td>'+value['Comp']+'</td><td>'+conference+'</td><td>'+Number(value['TOI']/60).toFixed(2)+'</td><td>'+Number(value['CompTOI%']).toFixed(2)+'</td><td>'+value['CF']+'</td><td>'+value['CA']+'</td><td>'+Number(value['CF%']).toFixed(2)+'</td><td>'+Number(value['CF/60']).toFixed(2)+'</td><td>'+Number(value['CA/60']).toFixed(2)+'</td><td>'+Number(value['CF60RelComp']).toFixed(2)+'</td><td>'+Number(value['CA60RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelAll']).toFixed(2)+'</td><td>'+Number(value['DFF']).toFixed(2)+'</td><td>'+Number(value['DFA']).toFixed(2)+'</td><td>'+Number(value['DFF%']).toFixed(2)+'</td><td>'+Number(value['DFF/60']).toFixed(2)+'</td><td>'+Number(value['DFA/60']).toFixed(2)+'</td><td>'+Number(value['DFF60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFA60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelAll']).toFixed(2)+'</td><td>'+value['GF']+'</td><td>'+value['GA']+'</td><td>'+Number(value['GF%']).toFixed(2)+'</td><td>'+Number(value['GF/60']).toFixed(2)+'</td><td>'+Number(value['GA/60']).toFixed(2)+'</td></tr>';
        }
    });
    $("#dataTable").html("<table>"+htmlTable+"</table>");
    var resort = true;
      $("table").trigger("update", [resort]);
  });

  $("#WowySubmit").click(function(e){
    var defaultPlayerID = $("#defaultPlayerID").val();
    var wowyPlayerID = $("#wowyPlayer").val();
    $(location).attr('href', wowyURL+"/"+defaultPlayerID+"/"+wowyPlayerID);
  });

});