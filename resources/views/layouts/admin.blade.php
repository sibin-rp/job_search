<!doctype html>
<html lang="en" ng-app="appAccelaar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Accelaar | Admin Dashboard </title>
  <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">
  <script type="text/javascript" src="{{asset('js/admin/admin.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/admin/admin-angular.min.js')}}"></script>
</head>
<body>
<div class="wrapper">
  <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <div class="sidebar-wrapper">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
          Creative Tim
        </a>
      </div>

      <ul class="nav">
        <li class="active">
          <a href="dashboard.html">
            <i class="pe-7s-graph"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li>
          <a href="user.html">
            <i class="pe-7s-user"></i>
            <p>User Profile</p>
          </a>
        </li>
        <li>
          <a href="table.html">
            <i class="pe-7s-note2"></i>
            <p>Table List</p>
          </a>
        </li>
        <li>
          <a href="typography.html">
            <i class="pe-7s-news-paper"></i>
            <p>Typography</p>
          </a>
        </li>
        <li>
          <a href="icons.html">
            <i class="pe-7s-science"></i>
            <p>Icons</p>
          </a>
        </li>
        <li>
          <a href="maps.html">
            <i class="pe-7s-map-marker"></i>
            <p>Maps</p>
          </a>
        </li>
        <li>
          <a href="notifications.html">
            <i class="pe-7s-bell"></i>
            <p>Notifications</p>
          </a>
        </li>
        <li class="active-pro">
          <a href="upgrade.html">
            <i class="pe-7s-rocket"></i>
            <p>Upgrade to PRO</p>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="main-panel">
    @include('admin.partials.sidebar')


    <div class="content">
      <div class="content-fluid">
        @yield('content')
      </div>
    </div>


    @include('admin.partials.footer')

  </div>
</div>

</body>
</html>