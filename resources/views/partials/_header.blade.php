<nav class="navbar navbar-default c-navbar" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
      <a class="navbar-brand" href="{{route('home')}}">
        <h2 class="text-uppercase">Accelaar</h2>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about-us">About Us</a></li>
        @php
          $user = Auth::user();
        @endphp
        @if(isset($user))
          <li class="login dropdown">
            <a id="dLabel" data-target="#" href="http://example.com" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              {{$user->username or 'Hi! User'}}
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dLabel">
              <li>
                <a href="">Profile</a>
              </li>
              <li>
                <a href="">Edit</a>
              </li>
              <li>
                <a href="">FAQ</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="">
                  Logout
                </a>
              </li>
            </ul>
          </li>
        @else
          <li class="login"><a href="{{route('login_page')}}">Login</a></li>
        @endif
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
</nav>