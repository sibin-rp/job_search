<div class="top">
  <div class="container ">
    <div class="row">
      <div class="col-md-12">
        <h1>Accellar</h1>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-default">
  <div class="top1">
    <div class="container">

      <div class="navbar-header">
        <a class="navbar-brand" href="{{route('experience.index',$user->id)}}">Internship</a>
      </div>
      <ul class="nav navbar-nav">

        <li><a href="{{route('preference.index',$user)}}">Preferences</a></li>
        <li><a href="{{route('qualification.index',$user)}}">Qualification </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('user.show',$user)}}">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Settings<span
              class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('user.show',$user->id)}}">Profile</a></li>
            <li><a href="{{route('user.edit',$user->id)}}">Edit</a></li>
            <li><a href="#">Page </a></li>
          </ul>
        </li>
        <li><a href="{{route('logout_page')}}"> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  

    