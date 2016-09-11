<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ACCELAAR</title>
    <meta name="csrf_token" content="{{csrf_token()}}">
    {{--<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>--}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}" media="screen" title="no title" charset="utf-8">
</head>

<body>
    <div class="page">
        @include('partials._header')
        @yield('content')
        @include('partials._footer')
    </div>
    @yield('modals')
    @include('partials._flash_data')
</body>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>

</html>