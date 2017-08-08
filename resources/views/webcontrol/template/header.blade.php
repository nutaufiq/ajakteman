<div id="header">
  <div class="container-fluid">
    <ul class="topbar-nav">
      <li><p class="topbar-text">Signed in as {{ Auth::guard('admin')->user()->name }}</p></li>
          <!-- <li><a href="{{ url('webcontrol/user/changepassword') }}" title="Change Password"><i class="fa fa-key" aria-hidden="true"></i></a></li> -->
      <li><a href="{{ url('webcontrol/logout') }}" title="Logout"><i class="fa fa-lock" aria-hidden="true"></i></a></li>
    </ul>
  </div>
</div>