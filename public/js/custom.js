$(document).ready(function(){
  $("#competition").val("All");
  $("#position").val("All");
  $("#toi").val(0);
  $("#puckiq").tablesorter({
    sortInitialOrder  : 'desc',
    widgets           : ['zebra', 'columns'],
  }); 
  var tableInit = 1;
  $("#customSearch").submit(function(e){
    var htmlTable = "";    
    e.preventDefault();
    $('#myModal').modal({
      backdrop: 'static',
      keyboard: false
    });
    $.ajax({
      type: "POST",
      url: searchURL,
      data: $("#customSearch").serialize(),
      success: function(response){
        /*$("#searchResults").html(response);
        $('#myModal').modal("hide");*/
        var parseData = JSON.parse(response.replace(/&quot;/g,'"'));          
        $.each(parseData,function(key,value){            
          var conference = value['Conf'];
          var toiMin = Number($("#toi").val());  
          if(value['Conf']=="Both"){
            conference = "All";
          }
          if($("#competition").val()=="All"){
            if(Number(value['TOI']/60).toFixed(2) > toiMin){
              htmlTable += '<tr><td style="white-space: nowrap;"><a href="'+playerURL+'/'+value['PlayerId']+'">'+value['Player']+'</a></td><td>'+value['Team']+'</td><td>'+value['Pos']+'</td><td>'+value['Comp']+'</td><td>'+Number(value['TOI']/60).toFixed(2)+'</td><td>'+Number(value['CompTOI%']).toFixed(2)+'</td><td>'+value['CF']+'</td><td>'+value['CA']+'</td><td>'+Number(value['CF%']).toFixed(2)+'</td><td>'+Number(value['CF/60']).toFixed(2)+'</td><td>'+Number(value['CA/60']).toFixed(2)+'</td><td>'+Number(value['CF60RelComp']).toFixed(2)+'</td><td>'+Number(value['CA60RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelAll']).toFixed(2)+'</td><td>'+Number(value['DFF']).toFixed(2)+'</td><td>'+Number(value['DFA']).toFixed(2)+'</td><td>'+Number(value['DFF%']).toFixed(2)+'</td><td>'+Number(value['DFF/60']).toFixed(2)+'</td><td>'+Number(value['DFA/60']).toFixed(2)+'</td><td>'+Number(value['DFF60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFA60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelAll']).toFixed(2)+'</td><td>'+value['GF']+'</td><td>'+value['GA']+'</td><td>'+Number(value['GF%']).toFixed(2)+'</td><td>'+Number(value['GF/60']).toFixed(2)+'</td><td>'+Number(value['GA/60']).toFixed(2)+'</td></tr>';
            }
          }else{
            if((Number(value['TOI']/60).toFixed(2) > toiMin) && value['Conf'] == "Both"){
              htmlTable += '<tr><td style="white-space: nowrap;"><a href="'+playerURL+'/'+value['PlayerId']+'">'+value['Player']+'</a></td><td>'+value['Team']+'</td><td>'+value['Pos']+'</td><td>'+value['Comp']+'</td><td>'+Number(value['TOI']/60).toFixed(2)+'</td><td>'+Number(value['CompTOI%']).toFixed(2)+'</td><td>'+value['CF']+'</td><td>'+value['CA']+'</td><td>'+Number(value['CF%']).toFixed(2)+'</td><td>'+Number(value['CF/60']).toFixed(2)+'</td><td>'+Number(value['CA/60']).toFixed(2)+'</td><td>'+Number(value['CF60RelComp']).toFixed(2)+'</td><td>'+Number(value['CA60RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelComp']).toFixed(2)+'</td><td>'+Number(value['CF%RelAll']).toFixed(2)+'</td><td>'+Number(value['DFF']).toFixed(2)+'</td><td>'+Number(value['DFA']).toFixed(2)+'</td><td>'+Number(value['DFF%']).toFixed(2)+'</td><td>'+Number(value['DFF/60']).toFixed(2)+'</td><td>'+Number(value['DFA/60']).toFixed(2)+'</td><td>'+Number(value['DFF60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFA60RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelComp']).toFixed(2)+'</td><td>'+Number(value['DFF%RelAll']).toFixed(2)+'</td><td>'+value['GF']+'</td><td>'+value['GA']+'</td><td>'+Number(value['GF%']).toFixed(2)+'</td><td>'+Number(value['GF/60']).toFixed(2)+'</td><td>'+Number(value['GA/60']).toFixed(2)+'</td></tr>';
            }
          }          
        });
        $("#tableHead").removeClass("hidden");
        $("#dataTable").html(htmlTable);
        $("#puckiq").trigger("update");
        $('#myModal').modal("hide");
      }      
    });      
  });

});