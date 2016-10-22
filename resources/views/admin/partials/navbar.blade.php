<nav class="navbar navbar-default navbar-fixed">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Dashboard</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-left">
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-dashboard"></i>
          </a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
            Dropdown
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">
                <span class="fa fa-user"></span>
                Profile
              </a></li>
            <li><a href="#">
                <span class="fa fa-gear"></span>
                Settings
              </a></li>

            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        <li>
          <a href="{{route('admin_logout')}}">
            Log out
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>