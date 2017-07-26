<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}"><img style="max-height:200px; margin-top:-80px;" src="{{ asset('images/main-puckiq.svg')}}" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teams <span class="caret"></span></a>
              <ul class="dropdown-menu columns-2">
              <li>
                <ul class="list-unstyled col-sm-6">
                <li>Atlantic</li>
                <li><a href="{{url('/teams/BOS')}}">BOS</a></li>
                <li><a href="{{url('/teams/BUF')}}">BUF</a></li>
                <li><a href="{{url('/teams/DET')}}">DET</a></li>
                <li><a href="{{url('/teams/FLA')}}">FLA</a></li>
                <li><a href="{{url('/teams/MTL')}}">MTL</a></li>
                <li><a href="{{url('/teams/OTT')}}">OTT</a></li>
                <li><a href="{{url('/teams/TBL')}}">TBL</a></li>
                <li><a href="{{url('/teams/TOR')}}">TOR</a></li>
                <li role="separator" class="divider"></li>
                </ul>
                <ul class="list-unstyled col-sm-6">
                <li>Metropolitan</li>
                <li><a href="{{url('/teams/CAR')}}">CAR</a></li>
                <li><a href="{{url('/teams/CBJ')}}">CBJ</a></li>
                <li><a href="{{url('/teams/NJD')}}">NJD</a></li>
                <li><a href="{{url('/teams/NYR')}}">NYR</a></li>
                <li><a href="{{url('/teams/NYI')}}">NYI</a></li>
                <li><a href="{{url('/teams/PHI')}}">PHI</a></li>
                <li><a href="{{url('/teams/PIT')}}">PIT</a></li>
                <li><a href="{{url('/teams/WSH')}}">WSH</a></li>
                <li role="separator" class="divider"></li>
                </ul>
                <ul class="list-unstyled col-sm-6">             
                <li>Central</li>
                <li><a href="{{url('/teams/DAL')}}">DAL</a></li>
                <li><a href="{{url('/teams/CHI')}}">CHI</a></li>
                <li><a href="{{url('/teams/COL')}}">COL</a></li>
                <li><a href="{{url('/teams/MIN')}}">MIN</a></li>
                <li><a href="{{url('/teams/NSH')}}">NSH</a></li>
                <li><a href="{{url('/teams/STL')}}">STL</a></li>
                <li><a href="{{url('/teams/WPG')}}">WPG</a></li>
                </ul>
                <ul class="list-unstyled col-sm-6">
                <li>Pacific</li>
                <li><a href="{{url('/teams/ANA')}}">ANA</a></li>
                <li><a href="{{url('/teams/ARI')}}">ARI</a></li>
                <li><a href="{{url('/teams/CGY')}}">CGY</a></li>
                <li><a href="{{url('/teams/EDM')}}">EDM</a></li>
                <li><a href="{{url('/teams/LAK')}}">LAK</a></li>
                <li><a href="{{url('/teams/SJS')}}">SJS</a></li>
                <li><a href="{{url('/teams/VAN')}}">VAN</a></li>
                </ul>
              </li>
              </ul>
            </li>
            <li><a href="#">Players</a></li>
            <li><a href="{{url('/about')}}">About</a></li>
            <li><a href="#contact">Blog</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>