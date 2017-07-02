@extends('layouts.master')
@section('title')
| Player Search
@endsection

@section('stylesheets')
<link href="{{ asset('css/theme.default.min.css')}}" rel="stylesheet">
@endsection
@section('content')
      <div class="container-fluid" role="main">
        <div class="page-header">
            <h4>Custom Search</h4>
            <div class="row">
              <div class="col-md-6">
                <form name="customSearch" id="customSearch">
                  {{ csrf_field() }}
                  Season : 
                  <select name="season" id="season">
                    <option value="20162017">2016-17</option>
                  </select> 
                  Competition : 
                  <select name="competition" id="competition">
                    <option value="All">All</option>
                    <option value="Elite">Elite</option>
                    <option value="Middle">Middle</option>
                    <option value="Gritensity">Gritensity</option>
                  </select> 
                  Position :
                  <select name="position" id="position">
                    <option value="All">All</option>
                    <option value="C,L,R">Forwards</option>
                    <option value="C">Centre</option>
                    <option value="L">Left Wing</option>
                    <option value="R">Right Wing</option>
                    <option value="D">Defence</option>
                  </select> 
                  TOI:
                  <select name="toi" id="toi">
                    <option value=0>All</option>
                    <option value=100>100+ minutes</option>
                    <option value=250>250+ minutes</option>
                    <option value=500>500+ minutes</option>
                    <option value=750>750+ minutes</option>
                    <option value=1000>1000+ minutes</option>
                    <option value=1250>1250+ minutes</option>
                  </select>
                  <input type="submit" class="btn btn-xs btn-success" id="SearchSelectSubmit" value="Search">
                </form>  
              </div>
            </div>
              <div class="row">
                <div class="col-md-12" id="searchResults">                  
                  <table class="table table-striped table-bordered table-condensed table-hover" id="puckiq">
                    <thead id="tableHead" class="hidden">
                      <tr>
                        <th>Player</th>
                        <th>team</th>
                        <th>Pos</th><th data-sorter="false">Comp</th>
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
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>
        
@endsection
@section('modals')
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h2>Loading Player Data</h2>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
var searchURL = "{{url('playerSearch')}}";
</script>
<script src="{{ asset('js/tablesort.js')}}"></script>
<script src="{{ asset('js/widgets.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script> 
@endsection