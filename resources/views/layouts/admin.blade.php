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

  @include('admin.partials.sidebar')
  <div class="main-panel">
    @include('admin.partials.navbar')


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