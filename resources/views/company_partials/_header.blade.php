<div class="nimmy-top">
  <div class="container ">
    <div class="row">
      <div class="col-md-12">
        <h1 class="r-white-text">Accellar</h1>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-default">
  <div class="nimmy-top1">
    <div class="container">

      <div class="navbar-header">
        <a class="navbar-brand" href="{{route('experience.index',$user->id)}}">Home</a>
      </div>
      <ul class="nav navbar-nav">
        <li>
          @if($user->company()->get()->count() > 0)
            <a href="{{route('company.index')}}">Companies</a>
          @else
            <a href="{{route('company.show')}}">Add Company</a>
          @endif
        </li>
        <li><a href="{{route('internships_program.index',['company_user'=>$user])}}">Internship Program</a></li>
        <li><a href="{{route('internships_program.create',['company_user'=>$user])}}">Add Internship Program</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('user.show',$user)}}">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Settings<span
              class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('company.edit',$user->company)}}">Company Details</a></li>
            <li class="divider"></li>
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
  

    