<!doctype html>
<html>
<head>
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta charset="utf-8">
  <meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">

  <!-- Use title if it's in the page YAML frontmatter -->
  <title>Accellar | User Dashboard</title>

  <link href='//fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{asset('css/user/user.css')}}">
  <script type="text/javascript" src="{{asset('js/user/user.js')}}"></script>
</head>

<body class="user-page">
  @include('user_partial._header')
  @yield('content')
  @include('user_partial._footer')
  @yield('modal')
</body>
</html>
