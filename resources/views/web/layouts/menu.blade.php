<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user-circle-o"></i> {{ (Auth::user()->name) ? strtoupper(Auth::user()->name) : strtoupper(Auth::user()->get_email_name(Auth::user()->email)) }}</a></li>
        <li><a href="{{ url('dashboard') }}">AJAK TEMAN</a></li>
        <li><a href="{{ url('dashboard/pasang-iklan') }}">PASANG IKLAN</a></li>
        <li><a href="{{ url('dashboard/logout') }}" title="Logout"><i class="fa fa-lock" aria-hidden="true"></i>
 KELUAR</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>