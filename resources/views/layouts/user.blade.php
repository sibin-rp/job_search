<!doctype html>
<html>
<head>
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta charset="utf-8">
  <meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
  <meta content="{{csrf_token()}}" name="csrf_meta">
  <!-- Use title if it's in the page YAML frontmatter -->
  <title>Accellar | User Dashboard</title>

  <link href='//fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{asset('css/user/user.css')}}">
  <script type="text/javascript" src="{{asset('js/user/user.js')}}"></script>
</head>

<body class="user-page">
  @if($user->type=="1")
    @include('company_partials._header')
  @else
    @include('user_partial._header')
  @endif

  <div class="container ">
    <div class="row">
      @if($user->type == "1")
        @include('company_partials._sidebar')
      @else
        @include('user_partial._sidebar')
      @endif
      @yield('content')
    </div>
  </div>
  @include('user_partial._footer')
  @yield('modal')
  @yield('extra_js')
</body>
</html>
